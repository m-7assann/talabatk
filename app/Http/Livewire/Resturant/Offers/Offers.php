<?php

namespace App\Http\Livewire\Resturant\Offers;

use App\Models\Meal;
use Livewire\Component;

class Offers extends Component
{
    public function cancel_offer($meal){
        $meal=Meal::findOrFail($meal);
        $meal->discount=0;
        $meal->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم إلغاء العرض بنجاح']);
    }
    public function render()
    {
        $meals=Meal::with(['resturant'])->where('discount', '>', '0')->where('resturant_id',auth()->id())->latest()->paginate(10);
        return view('livewire.resturant.offers.offers',compact('meals'))->extends('layout.dashboard.resturants.app')->section('content');
    }
}
