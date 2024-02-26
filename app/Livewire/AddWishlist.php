<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class AddWishlist extends Component
{
    public $product_details;
    public $button;
    public function render()
    {
        return view('livewire.add-wishlist');
    }

    public function addToWishlist()
    {

        $product = Product::find($this->product_details->id);
        if ($product) {

            Cart::session('wishlist')->add(array(
                'id' => $this->product_details->id,
                'name' => $this->product_details->title,
                'price' => $this->product_details->offer_price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $this->product_details->image,
                    'slug' => $this->product_details->slug,
                    'stock' =>  $this->product_details->stock,
                )

            ));
        }
    }
}
