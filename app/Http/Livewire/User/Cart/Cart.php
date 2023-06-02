<?php

namespace App\Http\Livewire\User\Cart;

use Livewire\Component;

class Cart extends Component
{
    public $items;
    protected $listeners = ['update_cart'];
    public function update_cart(){
        $this->items= \Cart::getContent();
    }
    public function render()
    {
        return view('livewire.user.cart.cart')->extends('layout.users.master')->section('page-main');
    }
    public function mount()
    {
        $this->items= \Cart::getContent();
    }

    public function delete_item($item_id){
        \Cart::remove($item_id);
        $this->items= \Cart::getContent();
        $this->emit('updateCount');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم حذف الوجبة من السلة بنجاح']);
    }
    public function delete_all()
    {
        \Cart::clear();
        $this->items= \Cart::getContent();
        $this->emit('updateCount');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم افراغ السلة بنجاح']);
    }
}
