<?php

namespace App\Http\Livewire\User\Notifications;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {

        $notifications=Notification::where('type','user')->where('user_id',auth()->id())->latest()->simplePaginate(10);
        foreach($notifications as $notification){
            $notification->markAsSeen();
        }
        return view('livewire.user.notifications.notifications',compact('notifications'))->extends('layout.users.master')->section('page-main');
    }
}
