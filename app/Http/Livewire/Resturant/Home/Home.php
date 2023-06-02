<?php

namespace App\Http\Livewire\Resturant\Home;

use App\Models\Order;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $items=Order::with(['meal','user'])->where(function($q){
            $q->where('resturant_id',auth()->id());
        })->latest()->take(10)->get();
        return view('livewire.resturant.home.home',compact('items'))->extends('layout.dashboard.resturants.app')->section('content');
    }
}
