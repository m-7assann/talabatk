<?php

namespace App\Http\Livewire\User\Cart;

use Livewire\Component;

class EditQuantity extends Component
{
    public $item,$quantity,$width;
    public function render()
    {
        
        return view('livewire.user.cart.edit-quantity');
    }

public function mount(){
    $this->quantity=$this->item->quantity;
}

    public function updateQuantity(){
        \Cart::update(
            $this->item['id'],
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $this->quantity
                ],
            ]
        );
        $this->emit('update_cart'); 
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل الكمية بنجاح']);
    }
}
