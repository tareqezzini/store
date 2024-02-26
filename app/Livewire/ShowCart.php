<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class ShowCart extends Component
{
    protected $listeners = ['productAddedToCart' => 'render'];
    public function render()
    {
        return view('livewire.show-cart');
    }



    public function removeFromCart($id)
    {

        Cart::session('cart')->remove($id);
        $this->dispatch('productAddedToCart');
    }
}
