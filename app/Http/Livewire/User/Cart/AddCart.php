<?php

namespace App\Http\Livewire\User\Cart;

use App\Models\Meal;
use Livewire\Component;

class AddCart extends Component
{
    public $meal,$quantity,$resturant;
    public function render()
    {
        return view('livewire.user.cart.add-cart');
    }
    public function mount(){
        $this->resturant=$this->meal->resturant;
    }
    protected $rules = [
        'quantity' => ['required', 'numeric'],
    ];
    protected $messages = [
        'quantity.required' => 'يرجى إدحال الكمية',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function addToCart()
    {
        $this->validate();
        $price=$this->meal->price - $this->meal->discount;
        \Cart::add([
            'id' => $this->meal->id,
            'name' => $this->meal->name,
            'price' => $price,
            'quantity' => $this->quantity,
            'attributes' => array(
                'image' => $this->meal->image,
            ),
            'associatedModel'=>$this->meal
        ]);
        $this->quantity=null;
        $this->emit('updateCount');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم إضافة الوجبة بنجاح']);
    }
}
