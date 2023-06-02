<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Order;
use App\Models\User;

class OrderObserve
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $user=User::findOrFail($order->user_id);
        $link=route('resturant.orders');
            Notification::send('طلب جديد','لديك طلب جديد من '.$user->name,'resturant',$link,$order->resturant_id);
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if($order->isDirty('status')){
            if(activeGuard()=='web'){
                $link=route('resturant.orders');
                Notification::send('تغيير حالة الطلب','تم تغيير حالة طلب الزبون '.$order->user->name.' الى '.__($order->status),'resturant',$link,$order->resturant_id);
            }
            $link=route('my_orders');
            Notification::send('تغيير حالة الطلب','تم تغيير حالة طلب الوجبة '.$order->meal->name.' الى '.__($order->status),'user',$link,$order->user_id);
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
