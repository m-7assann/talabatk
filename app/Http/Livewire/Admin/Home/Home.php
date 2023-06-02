<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\Order;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $items=Order::with(['meal','user'])->where(function($q){
        })->latest()->take(10)->get();
        return view('livewire.admin.home.home',compact('items'))->extends('layout.dashboard.admin.app')->section('content');
    }
}
