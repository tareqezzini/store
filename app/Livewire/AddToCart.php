<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class AddToCart extends Component
{
    public $product_details;
    public $button;

    public function render()
    {
        return view('livewire.add-to-cart');
    }
    public function addToCart()
    {
        $product = Product::find($this->product_details->id);
        // dd($product);
        if ($product) {


            $status = Cart::session('cart')->add(array(
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->offer_price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $product->image,
                    'slug' => $product->slug,
                )
            ));

            if ($status) {
                $wishlistCart = Cart::session('wishlist');
                $wishlistItem = $wishlistCart->get($product->id);

                if ($wishlistItem) {
                    // Remove the product from the wishlist cart
                    $wishlistCart->remove($product->id);
                }
            }
        }

        $this->dispatch('productAddedToCart');
    }
}
