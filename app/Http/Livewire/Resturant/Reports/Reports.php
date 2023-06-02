<?php

namespace App\Http\Livewire\Resturant\Reports;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $to,$from;
    public function between($query)
    {
        if ($this->from && $this->to) {
            $query->whereBetween('created_at', [$this->from, $this->to]);
        } elseif ($this->from) {
            $query->where('created_at', '>=', $this->from);
        } elseif ($this->to) {
            $query->where('created_at', '<=', $this->to);
        } else {
            $query;
        }
    }
    public function render()
    {
        $items=Order::with(['meal','user'])->where(function($q){
                $q->where('resturant_id',auth()->id());
                $this->between($q);
        })->latest()->paginate(10);
        return view('livewire.resturant.reports.reports',compact('items'))->extends('layout.dashboard.resturants.app')->section('content');
    }
}
