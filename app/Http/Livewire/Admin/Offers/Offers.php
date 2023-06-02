<?php

namespace App\Http\Livewire\Admin\Offers;

use App\Models\Meal;
use Livewire\Component;

class Offers extends Component
{
    public function render()
    {
        $offers=Meal::with(['resturant'])->where('discount', '>', '0')->latest()->paginate(10);
        return view('livewire.admin.offers.offers',compact('offers'))->extends('layout.dashboard.admin.app')->section('content');
    }
}
