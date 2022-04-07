<?php

namespace App\Listeners;

use App\Http\Controllers\ExternalPaymentController;
use App\Models\ExternalPayment;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{

    /**
     * Handle received Stripe webhooks.
     * uses https://stripe.com/docs/payments/payment-intents/verifying-status
     *
     * @param  \Laravel\Cashier\Events\WebhookReceived  $event
     * @return void
     */
    public function handle(WebhookReceived $event)
    {
        if ($event->payload['type'] === 'payment_intent.succeeded')
        {
            $this->handleInvoicePaymentSucceeded($event);
        }
    }


    private function handleInvoicePaymentSucceeded(WebhookReceived $event): bool
    {
        if ($event->payload['type'] === 'payment_intent.succeeded')
        {
            $stripeData = $event->payload['data']['object'];

            $externalPayment = ExternalPayment::where('stripe_id', $stripeData['id'])
                ->firstOrFail();

            return ExternalPaymentController::process($externalPayment);
        }

        return false;
    }
}
