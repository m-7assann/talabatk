<?php

namespace App\Http\Livewire\Resturant\Orders;

use Livewire\Component;

class Status extends Component
{
    public $for, $item, $payment_status, $status;
    public function change_payment_status()
    {
        $this->item->update(['payment_status' => $this->payment_status]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل حالة الدفع بنجاح']);
    }
    public function change_status()
    {
        $this->item->update(['status' => $this->status]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل حالة الطلب بنجاح']);
    }
    public function mount()
    {
        if ($this->for == "payment") {
            $this->payment_status = $this->item->payment_status;
        } else {
            $this->status = $this->item->status;
        }
    }
    public function render()
    {
        return view('livewire.resturant.orders.status');
    }
}
