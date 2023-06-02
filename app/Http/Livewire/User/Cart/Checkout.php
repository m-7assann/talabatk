<?php

namespace App\Http\Livewire\User\Cart;

use App\Models\Meal;
use App\Models\Order;
/* use App\Models\OrderItem; */
use App\Models\Payment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Checkout extends Component
{
    public $name, $mobile, $address, $notes, $type, $items;
    protected $client;
    protected $listeners = ['update_cart'];
    public function update_cart()
    {
        $this->items = \Cart::getContent();
    }
    protected $rules = [
        'name' => ['required', 'string'],
        'mobile' => ['required', 'numeric'],
        'address' => ['required', 'string'],
        'notes' => ['nullable', 'string'],
        'type' => ['required', 'in:internet,delivery'],
    ];
    protected $messages = [
        'name.required' => 'يرجى إدخال الاسم',
        'mobile.required' => 'يرجى إدخال رقم الهاتف',
        'address.required' => 'يرجى إدخال العنوان',
        'type.required' => 'يرجى اختيار طريقة الدفع',
    ];


    public function OrderPaypal(Order $order)
    {
        $this->client = App::make('paypal.client');
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => $order->id,
                "amount" => [
                    "value" => $order->total,
                    "currency_code" => "ILS"
                ]
            ]],
            "application_context" => [
                "cancel_url" => URL::route('cancel.paypal'),
                "return_url" => URL::route('return.paypal')
            ]
        ];

        try {
            $response = $this->client->execute($request);
            if ($response->statusCode == 201) {
                session()->put('paypal_order_id', $response->result->id);
                Payment::create([
                    'order_id' => $order->id,
                    'type' => $this->type,
                    'amount' => $order->total,
                    'status' => 'unpaid'
                ]);
                foreach ($response->result->links as $link) {
                    if ($link->rel == 'approve') {
                        return redirect()->away($link->href);
                    }
                }
            }
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function create()
    {
        $this->validate();
        foreach ($this->items as $item) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'name' => $this->name,
                'meal_id' => $item['associatedModel']['id'],
                'resturant_id' => $item['associatedModel']['resturant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                'mobile' => $this->mobile,
                'address' => $this->address,
                'notes' => $this->notes,
                'total' => \Cart::getTotal(),
                'status' => 'pending',
                'payment_status' => 'unpaid',
            ]);
        }

            if ($this->type == 'delivery') {
                Payment::create([
                    'order_id' => $order->id,
                    'type' => $this->type,
                    'amount' => $order->total,
                    'status' => 'unpaid'
                ]);
                foreach ($this->items as $item) {
                    $meal=Meal::findOrFail($item['associatedModel']['id']);
                    $meal->increment('count_buy',$item['quantity']);
                    $meal->save();
                }
            } else {
                $this->OrderPaypal($order);
            }

            \Cart::clear();
            $this->emit('updateCount');
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تأكيد الطلب بنجاح']);
            if ($this->type == 'delivery') {
                return redirect()->route('landPage');
            }
        }
    
    public function delete_item($item_id)
    {
        \Cart::remove($item_id);
        $this->items = \Cart::getContent();
        $this->emit('updateCount');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم حذف الوجبة من السلة بنجاح']);
    }

    public function render()
    {
        $this->items = \Cart::getContent();
        return view('livewire.user.cart.checkout')->extends('layout.users.master')->section('page-main');
    }
}
