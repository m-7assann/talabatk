<?php

namespace App\Http\Livewire\User\Cart;

use Livewire\Component;

class CartIcon extends Component
{
    public $count=0;
    protected $listeners = ['updateCount'=>'render'];
    public function render()
    {
        $this->count=\Cart::getContent()->count();
        return view('livewire.user.cart.cart-icon');
    }
}
