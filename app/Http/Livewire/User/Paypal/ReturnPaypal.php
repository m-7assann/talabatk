<?php

namespace App\Http\Livewire\User\Paypal;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReturnPaypal extends Component
{
    protected $client;
    public function render()
    {
        
        $this->client = App::make('paypal.client');
        $request = new OrdersCaptureRequest(session()->get('paypal_order_id'));
        $request->prefer('return=representation');
        try {
            $response = $this->client->execute($request);
            session()->forget('paypal_order_id');
            if($response->result->status=='COMPLETED'){
            $order=Order::findOrFail($response->result->purchase_units[0]->reference_id);
            $payment=Payment::where('order_id',$order->id)->first();
            $order->payment_status='paid';
            $order->save();
            $payment->status='paid';
            $payment->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'بالهناء والشفاء, سعدنا كثيرا برؤيتك']);
            return view('landing')->extends('layout.users.master')->section('page-main');
        }

        } catch (HttpException $ex) {
            echo $ex->statusCode;
            dd($ex->getMessage());
        }
    }
}
