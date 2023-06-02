<?php

namespace App\Http\Livewire\Admin\Notifications;

use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        $notifications=auth()->user()->notifications;
        foreach($notifications as $notification){
            $notification->markAsSeen();
        }
        return view('livewire.admin.notifications.notifications',compact('notifications'))->extends('layouts.admin')->section('content');
    }
}
