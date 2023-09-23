<?php

namespace App\Http\Controllers\Lists;

use App\ECommerce\Shared\Helpers\MyStripe;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class StripeController extends Controller
{
    private static $order;

    private function createOrder()
    {
        if (self::$order === null)
            self::$order = Order::create(['client_id' => auth()->id(), 'total_price' => session()->get('data')['sum']]);
        return self::$order;
    }

    /**
     * 1. Create order
     * 2. Insert cart products into order pivot table (order_product)
     * 3. Set order id in session
     * 4. Return a view conditionally
     */
    public function checkout()
    {
        $this->insertCartProductsIntoOrderPivotTable($this->createOrder());
        session()->put('order_id', $this->createOrder()->id);
        return ($this->createOrder()) ? view('Web.Lists.stripe') : redirect()->back();
    }

    public function pay(Request $request)
    {
        try {
            MyStripe::getinstance()->setApiKey()->chargeStripeAccount($this->prepareAmount(), $request->stripeToken);
            $this->storePayment($request->stripeToken);
            $this->updateClientData();
            $this->handleSessionData();
            return redirect('/cart');
        }catch (\Exception $e){
            return "Error";
        }
    }

    private function insertCartProductsIntoOrderPivotTable($order): void
    {
        foreach (session()->get('data')['products'] as $id => $valuesArray) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $valuesArray[0],
                'product_total_price' => $valuesArray[1]
            ]);
        }
    }

    private function handleSessionData(): void
    {
        Session::forget(['data', 'order_id']);
        Session::flash('success', 'Payment Successful!');
    }

    private function prepareAmount()
    {
        // amount should be in cents.
        return (is_int(session()->get('data')['sum'])) ? session()->get('data')['sum'] : session()->get('data')['sum'] * 100;
    }

    private function storePayment($stripeToken): void
    {
        // Store payment data.
        Payment::create([
            'order_id' => intval(session()->get('order_id')),
            'source_stripe_token' => $stripeToken
        ]);
    }

    private function updateClientData(): void
    {
        // Update order state.
        Order::find(session()->get('order_id'))->update(['state' => 'completed']);
        // Empty the cart.
        Cart::where('client_id', auth()->id())->delete();
    }
}
