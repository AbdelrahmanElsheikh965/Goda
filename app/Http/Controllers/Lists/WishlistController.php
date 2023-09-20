<?php

namespace App\Http\Controllers\Lists;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishlists()
    {
        return view('Web.Lists.wishlist');
    }

    /*
     * Show contents of the authenticated user's cart.
     */
    public function wishlist()
    {
        # For faster loading use query builder and select only required columns.
        $wishlistItems = DB::table('wishlists')->select(['product_id', 'name', 'price'])
            ->join('products', 'id', '=', 'product_id')
            ->join('images', 'id', '=', 'product_id')
            ->where('client_id', '=', Auth::id())->get();

        return view('Web.Lists.wishlist', compact('wishlistItems'));
    }

    /*
     * Remove cart items asynchronously using Ajax XHR requests.
     */
    public function removeFromWishlist(Request $request)
    {
        DB::table('wishlists')->where('client_id', '=', Auth::id())
            ->where('product_id', '=', $request->product_id)->delete();
        echo 'Removed Successfully';
    }

    /*
     * Add cart items asynchronously using Ajax XHR requests.
     */
    public function addToWishlist(Request $request)
    {
        $cart = Wishlist::where('product_id', $request->id)->first();

        if ($cart) {
            echo 'Warning: Already in your wishlist';
        } else {
            Wishlist::create([
                'client_id' => Auth::id(),
                'product_id' => $request->id
            ]);
            echo 'Done added to your wishlist';
        }
    }
}
