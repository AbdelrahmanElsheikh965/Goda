<?php


namespace App\ECommerce\Shared\Helpers;

use Stripe;

class MyStripe
{
    private static $instance;

    public static function getinstance()
    {
        if (self::$instance === null)
            self::$instance = new self;
        return self::$instance;
    }

    public function setApiKey()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        return $this;
    }

    public function chargeStripeAccount($amount, $stripeToken)
    {
        Stripe\Charge::create([
            "amount" =>  $amount,
            "currency" => "EGP",
            "source" => $stripeToken,
            "description" => "This payment is in test mode.",
        ]);
    }
}
