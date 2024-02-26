<?php

namespace App\Livewire;

use Cart;
use Darryldecode\Cart\Cart as CartCart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $carts;

    public function render()
    {
        $this->carts = Cart::session('cart')->getContent();
        return view('livewire.shopping-cart');
    }



    public function decrementQty($productId)
    {
        $cartItem = Cart::session('cart')->get($productId);

        if ($cartItem) {
            Cart::session('cart')->update($productId, [
                'quantity' => -1,
            ]);
        }
        $this->dispatch('productAddedToCart');
    }
    public function incrementQty($productId)
    {
        $cartItem = Cart::session('cart')->get($productId);

        if ($cartItem) {
            Cart::session('cart')->update($productId, [
                'quantity' => 1,
            ]);
        }
        $this->dispatch('productAddedToCart');
    }

    public function removeFromCart($productId)
    {
        $cartItem = Cart::session('cart')->get($productId);
        if ($cartItem) {
            Cart::session('cart')->remove($productId);
        }
        $this->dispatch('productAddedToCart');
    }
}
