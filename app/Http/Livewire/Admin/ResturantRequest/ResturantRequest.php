<?php

namespace App\Http\Livewire\Admin\ResturantRequest;

use App\Models\Resturant;
use Livewire\Component;

class ResturantRequest extends Component
{
    public function confirm($resturant){
        $resturant=Resturant::findOrFail($resturant);
        $resturant->update(['is_confirm'=>1]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تأكيد الطلب بنجاح']);
    }
    public function render()
    {
        $requests=Resturant::where('is_confirm',false)->paginate(10);
        return view('livewire.admin.resturant-request.resturant-request',compact('requests'))->extends('layout.dashboard.admin.app')->section('content');
    }
}
