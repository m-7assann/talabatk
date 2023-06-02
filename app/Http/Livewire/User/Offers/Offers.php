<?php

namespace App\Http\Livewire\User\Offers;

use App\Models\Category;
use App\Models\Meal;
use Livewire\Component;

class Offers extends Component
{
    public $categories, $offers, $category = null;

    public function getOffersByCategory($category_id)
    {
        $this->category = $category_id;
        if ($this->category) {
            $this->offers = Meal::with('resturant')->where('category_id', $category_id)->where('discount', '>', '0')->get();
        } else {
            $this->offers = Meal::with('resturant')->where('discount', '>', '0')->get();
        }
    }
    public function render()
    {
        return view('livewire.user.offers.offers')->extends('layout.users.master')->section('page-main');
    }
    public function mount()
    {
        $this->offers=Meal::with('resturant')->where('discount', '>', '0')->get();
        $this->categories=Category::all();
    }
    
}
