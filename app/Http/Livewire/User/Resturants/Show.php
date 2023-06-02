<?php

namespace App\Http\Livewire\User\Resturants;

use App\Models\Meal;
use App\Models\Resturant;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    public $resturant_mount,$details =true;
    use WithPagination;
    public function change_show(){
        $this->details=!$this->details;
    }
    public function mount(Resturant $resturant)
    {
        $this->resturant_mount = $resturant;
    }
    public function render()
    {

        $resturant=$this->resturant_mount->loadCount('meals','reviews');
        $best_meals = Meal::where('resturant_id', $this->resturant_mount->id)->where('discount', '=', '0')->orderBy('count_buy','DESC')->take(5)->get();
        $orders = Meal::where('resturant_id', $this->resturant_mount->id)->where('discount', '>', '0')->orderBy('count_buy','DESC')->get();
        $all_meals = Meal::where('resturant_id', $this->resturant_mount->id)->simplePaginate(10);
        return view('livewire.user.resturants.show',compact('all_meals','resturant','best_meals','orders'))->extends('layout.users.master')->section('page-main');
    }
}
