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

        $sessionId = $request->get('session_id');
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = CheckoutSession::retrieve($sessionId);
        } catch (\Exception $e) {
            return view('payment.error', ['message' => 'Stripe session error']);
        }

        $reference = $session->metadata->reference_code ?? null;
        $order = null;

        if ($reference) {
            $order = Order::where('reference_code', $reference)->first();
            if ($order) {

                $oldPaymentStatus = $order->payment_status ?? 'unpaid';
                $oldOrderStatus   = $order->order_status ?? 'draft';

                $order->update([
                    'payment_status' => 'paid',
                    'order_status'   => 'draft',
                ]);

                try {
                    Mail::to($order->email)->send(new OrderPaidMail($order));
                } catch (\Exception $e) {
                }


                try {
                    $admins = config('mail.admin_recipients', []);

                    if (!empty($admins)) {
                        foreach ($admins as $adminEmail) {
                            Mail::to($adminEmail)->send(new AdminOrderPaidMail($order));
                        }
                    }
                } catch (\Exception $e) {
                    Log::error("❌ Mail to admin failed for order {$order->reference_code}: " . $e->getMessage());
                }
            }
        }
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
