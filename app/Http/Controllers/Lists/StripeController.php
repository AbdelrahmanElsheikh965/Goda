<?php

namespace App\Http\Controllers\Lists;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Facades\Session;


class StripeController extends Controller
{
    public function checkout()
    {
        $order = Order::create([ 'client_id' => auth()->id(), 'total_price' => session()->get('data')['sum']]);
        foreach (session()->get('data')['products'] as $id => $valuesArray)
        {
            OrderProduct::create([
                'order_id'    => $order->id,
                'product_id'    => $id,
                'quantity'      => $valuesArray[0],
                'product_total_price' => $valuesArray[1]
            ]);
        }
        session()->put('order_id', $order->id);
        return ($order) ? view('Web.Lists.stripe') : redirect()->back();
    }

    public function pay(Request $request)
    {
        // amount should be in cents.
        $amount = (is_int(session()->get('data')['sum'])) ? session()->get('data')['sum'] : session()->get('data')['sum'] * 100;

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" =>  $amount,
            "currency" => "EGP",
            "source" => $request->stripeToken,
            "description" => "This payment is in test mode.",
        ]);

        // Store payment data.
        Payment::create([
            'order_id'    => intval(session()->get('order_id')),
            'source_stripe_token' => $request->stripeToken
        ]);

        Order::find(session()->get('order_id'))->update(['state' => 'completed']);

        // Empty the cart.
        Cart::where('client_id', auth()->id())->delete();

        Session::forget(['data', 'order_id']);
        Session::flash('success', 'Payment Successful!');

        return redirect('/cart');
    }
}
