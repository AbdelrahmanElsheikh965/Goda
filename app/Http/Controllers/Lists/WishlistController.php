<?php

namespace App\Http\Controllers\Lists;

use App\ECommerce\Static\Models\Paragraph;
use App\ECommerce\Static\Models\WebImage;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishlists()
    {
        $webImages = WebImage::all();
        $webParagraphs = Paragraph::all();
        $contactDetails = ContactUs::first();

        return view('Web.Lists.wishlist',
            [
                'webImages'      => $webImages,
                'webParagraphs'  => $webParagraphs,
                'contactDetails' => $contactDetails
            ]);
    }

    /*
     * Show contents of the authenticated user's cart.
     */
    public function wishlist()
    {
        $webImages = WebImage::all();
        $webParagraphs = Paragraph::all();
        $contactDetails = ContactUs::first();
        # For faster loading use query builder and select only required columns.
        $wishlistItems = DB::table('wishlists')->select(['products.id', 'products.name', 'products.cover_image', 'products.price', 'products.discount'])
            ->join('products', 'product_id', '=', 'id')
            ->where('client_id', '=', Auth::id())->get();

//        dd($wishlistItems);
        return view('Web.Lists.wishlist',
            [
                'webImages'      => $webImages,
                'webParagraphs'  => $webParagraphs,
                'contactDetails' => $contactDetails
            ], compact('wishlistItems'));
    }

    /*
     * Remove cart items asynchronously using Ajax XHR requests.
     */
    public function removeFromWishlist(Request $request)
    {
        DB::table('wishlists')->where('client_id', '=', Auth::id())
            ->where('product_id', '=', $request->id)->delete();
        echo 'Removed Successfully';
    }

    /*
     * Add cart items asynchronously using Ajax XHR requests.
     */
    public function addToWishlist(Request $request)
    {
        $wishlist = Wishlist::where('client_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($wishlist) {
            echo 'Warning: Already in your wishlist';
        } else {
            Wishlist::create([
                'client_id' => Auth::id(),
                'product_id' => $request->product_id
            ]);
            echo 'Done added to your wishlist';
        }
    }
}
