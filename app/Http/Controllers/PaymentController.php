<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;
use App\Models\Order;
use App\Mail\OrderPaidMail;
use App\Mail\AdminOrderPaidMail;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        Log::info('---- STRIPE SUCCESS CALLBACK START ----');
        Log::info('Incoming request data:', $request->all());

        $sessionId = $request->get('session_id');
        Stripe::setApiKey(config('services.stripe.secret'));
        Log::info("Stripe session_id received: {$sessionId}");

        try {
            $session = CheckoutSession::retrieve($sessionId);
            Log::info('Stripe session retrieved successfully:', [
                'id' => $session->id,
                'email' => $session->customer_email,
                'metadata' => $session->metadata,
                'amount_total' => $session->amount_total,
                'payment_status' => $session->payment_status,
            ]);
        } catch (\Exception $e) {
            Log::error("❌ Stripe session retrieve failed: " . $e->getMessage());
            return view('payment.error', ['message' => 'Stripe session error']);
        }

        $reference = $session->metadata->reference_code ?? null;
        Log::info("Extracted reference_code from metadata: {$reference}");

        $order = null;

        if ($reference) {
            $order = Order::where('reference_code', $reference)->first();
            if ($order) {
                Log::info("✅ Order found:", $order->toArray());

                $oldPaymentStatus = $order->payment_status ?? 'unpaid';
                $oldOrderStatus   = $order->order_status ?? 'draft';

                $order->update([
                    'payment_status' => 'paid',
                    'order_status'   => 'draft',
                ]);

                Log::info("Order status updated:", [
                    'old_payment_status' => $oldPaymentStatus,
                    'new_payment_status' => 'paid',
                    'old_order_status' => $oldOrderStatus,
                    'new_order_status' => 'draft',
                ]);

                // Добавяме запис в историята
                $order->statusHistories()->create([
                    'old_payment_status' => $oldPaymentStatus,
                    'new_payment_status' => 'paid',
                    'old_order_status'   => $oldOrderStatus,
                    'new_order_status'   => 'draft',
                    'changed_by'         => null,
                ]);
                Log::info("✅ Status history entry created for order {$order->reference_code}");

                // Изпращане към клиента
                try {
                    Log::info("Attempting to send OrderPaidMail to customer: {$order->email}");
                    Mail::to($order->email)->send(new OrderPaidMail($order));
                    Log::info("✅ Mail to customer sent successfully for order {$order->reference_code}");
                } catch (\Exception $e) {
                    Log::error("❌ Mail to customer failed for order {$order->reference_code}: " . $e->getMessage());
                }

                // Изпращане към админите
                try {
                    $admins = config('mail.admin_recipients', []);
                    Log::info("Configured admin recipients:", $admins);

                    if (!empty($admins)) {
                        foreach ($admins as $adminEmail) {
                            Log::info("Attempting to send AdminOrderPaidMail to admin: {$adminEmail}");
                            Mail::to($adminEmail)->send(new AdminOrderPaidMail($order));
                            Log::info("✅ Mail sent to admin: {$adminEmail} for order {$order->reference_code}");
                        }
                    } else {
                        Log::warning("⚠️ No admin recipients configured in mail.admin_recipients");
                    }
                    Log::info("Mail to admin(s) process completed for order {$order->reference_code}");
                } catch (\Exception $e) {
                    Log::error("❌ Mail to admin failed for order {$order->reference_code}: " . $e->getMessage());
                }
            } else {
                Log::warning("⚠️ No order found in DB with reference_code {$reference}");
            }
        } else {
            Log::error("❌ Stripe metadata missing reference_code");
        }

        Log::info('---- STRIPE SUCCESS CALLBACK END ----');
        return view('payment.success', compact('order'));
    }

    public function cancel(Request $request)
    {
        $order = null;

        if ($request->has('reference_code')) {
            $order = Order::where('reference_code', $request->get('reference_code'))->first();
            if ($order) {
                $order->delete();
            }
        }

        return view('payment.cancel', compact('order'));
    }

    public static function createCheckoutSession($order)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        return CheckoutSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => 'Order #' . $order->reference_code,
                    ],
                    'unit_amount' => $order->final_price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('payment.cancel') . '?reference_code=' . $order->reference_code,
            'metadata'    => [
                'reference_code' => $order->reference_code,
            ],
        ]);
    }
}
