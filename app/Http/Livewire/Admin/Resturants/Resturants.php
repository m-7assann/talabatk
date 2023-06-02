<?php

namespace App\Http\Livewire\Admin\Resturants;

use App\Models\Resturant;
use Livewire\Component;

class Resturants extends Component
{
    public $confirm;
    public function filter_by_confirm($bool = null)
    {
        $this->confirm = $bool;
    }
    public function render()
    {
        $resturants = !is_null($this->confirm) ? Resturant::where('is_confirm', $this->confirm)->paginate(10) : Resturant::paginate(10);
        return view('livewire.admin.resturants.resturants', compact('resturants'))->extends('layout.dashboard.admin.app')->section('content');
    }
}
