<?php

namespace App\Http\Controllers\Lists;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /*
     * Show contents of the authenticated user's cart.
     */
    public function cart()
    {
        # For faster loading use query builder and select only required columns.
        $cartItems = DB::table('carts')->select(['products.id', 'products.name', 'products.price', 'products.cover_image', 'products.discount', 'quantity'])
            ->join('products', 'id', '=', 'product_id')
            ->where('client_id', '=', Auth::id())->get();

        $sum = 0;
        $data = array();

        if (count($cartItems) > 0)
        {
            // Calculate each product total price (price * quantity).
            foreach ($cartItems as $item)
            {
                $total = ($item->discount) ? ($item->price - ($item->price * $item->discount)) * $item->quantity : $item->price * $item->quantity;
                $data['products'][$item->id] = [$item->quantity, $total];
                $sum += $total;
            }
            $data['sum'] = $sum;
            session()->put('data', $data);
        }
        return view('Web.Lists.cart', compact('cartItems'));
    }

    /*
     * Remove cart items asynchronously using Ajax XHR requests.
     */
    public function removeFromCart(Request $request)
    {
        DB::table('carts')->where('client_id', '=', Auth::id())
            ->where('product_id', '=', $request->product_id)
            ->delete();
        echo 'Removed Successfully';
    }

    /*
     * Add cart items asynchronously using Ajax XHR requests.
     */
    public function addToCart(Request $request)
    {
        $cart = Cart::where('client_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            echo 'Warning: Already in your cart';
        } else {
            Cart::create([
                'client_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
            echo 'Done added to your cart';
        }
    }
}
