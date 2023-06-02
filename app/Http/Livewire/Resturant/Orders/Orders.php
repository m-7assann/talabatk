<?php

namespace App\Http\Livewire\Resturant\Orders;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
class Orders extends Component
{

    public $filter_status;
    use WithPagination;

    public function filter_by_status($key=null)
    {
        $this->filter_status = $key;
    }
    public function mount(){
        if(request('status')){
            $this->filter_status=request('status');
        }
    }
    public function render()
    {
        $items=Order::with(['meal','user'])->where(function($q){
            if(!$this->filter_status){
                $q->where('resturant_id',auth()->id());
            }else{
                $q->where('resturant_id',auth()->id())->where('status',$this->filter_status);
            }
            
        })->latest()->paginate(10);
        return view('livewire.resturant.orders.orders',compact('items'))->extends('layout.dashboard.resturants.app')->section('content');
    }
    
}
