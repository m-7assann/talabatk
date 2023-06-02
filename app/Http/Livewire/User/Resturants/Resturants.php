<?php

namespace App\Http\Livewire\User\Resturants;

use App\Models\Resturant;
use Livewire\Component;

class Resturants extends Component
{
    public $resturants,$key=null;
    public function mount()
    {
        $this->resturants = Resturant::all();
    }
    public function render()
    {
        return view('livewire.user.resturants.resturants')->extends('layout.users.master')->section('page-main');
    }

    public function search(){
        if($this->key){
            $this->resturants = Resturant::where('name', 'Like', "%$this->key%")->get();
        }else{
            $this->resturants = Resturant::all();
        }
    }
}
