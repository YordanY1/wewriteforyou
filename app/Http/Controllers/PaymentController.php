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
        $session = CheckoutSession::retrieve($sessionId);

        $reference = $session->metadata->reference_code ?? null;

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
            }
        }

        return redirect()->route('payment.success', ['reference_code' => $reference]);
    }

    public function cancel(Request $request)
    {
        if ($request->has('reference_code')) {
            $order = \App\Models\Order::where('reference_code', $request->get('reference_code'))->first();
            if ($order) {
                $order->delete();
            }
        }

        return redirect()->route('payment.cancel', [
            'reference_code' => $request->get('reference_code')
        ]);
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
