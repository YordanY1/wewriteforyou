<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = CheckoutSession::retrieve($sessionId);
        } catch (\Exception $e) {
            \Log::error("Stripe error: " . $e->getMessage());
            return view('payment.error', ['message' => 'Stripe session error']);
        }

        $reference = $session->metadata->reference_code ?? null;
        $order = null;

        if ($reference) {
            $order = \App\Models\Order::where('reference_code', $reference)->first();

            if ($order) {
                $oldStatus = $order->status ?? 'new';
                $order->update(['status' => 'paid']);

                $order->statusHistories()->create([
                    'old_status' => $oldStatus,
                    'new_status' => 'paid',
                    'changed_by' => null,
                ]);

                // try {
                //     \Mail::to($order->email)
                //         ->queue(new \App\Mail\OrderPaidMail($order));
                // } catch (\Exception $e) {
                //     \Log::error("Mail to customer failed: " . $e->getMessage());
                // }

                try {
                    \Mail::to(config('mail.admin_recipients'))
                        ->queue(new \App\Mail\AdminOrderPaidMail($order));
                } catch (\Exception $e) {
                    \Log::error("Mail to admin failed: " . $e->getMessage());
                }
            }
        }

        return view('payment.success', compact('order'));
    }

    public function cancel(Request $request)
    {
        $order = null;

        if ($request->has('reference_code')) {
            $order = \App\Models\Order::where('reference_code', $request->get('reference_code'))->first();
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
