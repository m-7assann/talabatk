<?php

namespace App\Http\Livewire\User\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    public $order;
    public function cancelOrder(Order $order){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $order->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم إلغاء الطلب بنجاح']);
    }
    public function showOrder(Order $order=null){
        $this->order=$order->id?$order:null;
        /* dd(($this->order)); */
    }
    public function render()
    {
        $orders=Order::with(['user','meal','resturant:id,name:id,name,slug'])->where('user_id',auth()->guard('web')->id())->latest()->simplePaginate(3);
        return view('livewire.user.orders.orders',compact('orders'))->extends('layout.users.master')->section('page-main');
    }
}
