<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

class wishlistController extends Controller
{
    public function index()
    {
        return view('website.pages.wishlist.index');
    }

    public function removeFromWishlist($id)
    {

        $status = Cart::session('wishlist')->remove($id);

        if ($status) {
            return redirect()->back()->with('success', 'The Product have been Deleted Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }


    // show Cart 

    public function showCart()
    {
        // $carts = Cart::session('cart_' . auth()->user()->id)->getContent();
        return view('website.pages.wishlist.cart');
    }
}
