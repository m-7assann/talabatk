<?php

namespace App\Http\Livewire\Resturant\Notifications;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {

        $notifications=Notification::where('type','resturant')->where('user_id',auth()->id())->latest()->simplePaginate(10);
        foreach($notifications as $notification){
            $notification->markAsSeen();
        }
        return view('livewire.resturant.notifications.notifications',compact('notifications'))->extends('layout.dashboard.resturants.app')->section('content');
    }
}
