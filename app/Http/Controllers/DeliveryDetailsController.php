<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryDetailsController extends Controller
{
    public function index(Request $request)
    {
        return view('deliveryDetails.deliveryDetails', ['platba' => $request->platba, 'doprava' => $request->doprava, 'user'=>User::find(Auth::id())]);
    }

    public function store(Request $request)
    {

        $payment = null;
        $delivery = null;
        $doprava = array("balikbox", "zasielkovna", "kurierom", "slovenska-posta");
        $platba = array("kreditna-karta", "prevod-na-ucet", "na-dobierku");
        foreach ($doprava as $item) {
            if ($item == $request->input('doprava')){
                $delivery = $request->input('doprava');}
        }
        foreach ($platba as $item) {
            if ($item == $request->input('platba')) {
                $payment = $request->input('platba');
            }
        }

        if ($delivery==null) {
            return redirect()->back();
        }
        if ($payment==null) {
            return redirect()->back();
        }

        $request->validate([
                'name' => 'required', 'string:value',
                'tel-number' => 'required', 'string:value',
                'email' => 'required', 'email',
                'city' => 'required', 'string:value',
                'postal_code' => 'required', 'string:value',
                'street' => 'required', 'string:value'
            ]
        );
        if (Auth::user()) {
            $user_id = (User::find(Auth::id()))->id;
            $order = new Order([
                    "user_id" => $user_id,
                    "phone_number" => $request->input('tel-number'),
                    "email" => $request->email,
                    "cart" => serialize($this->getCart()),
                    "transaction_method" => $payment,
                    "delivery_method" => $delivery,
                    "city" => $request->city,
                    "postal_code" => $request->postal_code,
                    "street" => $request->street
                ]
            );
        } else {
            $order = new Order([
                    "name" => $request->name,
                    "phone_number" => $request->input('tel-number'),
                    "email" => $request->email,
                    "cart" => serialize($this->getCart()),
                    "transaction_method" => $payment,
                    "delivery_method" => $delivery,
                    "city" => $request->city,
                    "postal_code" => $request->postal_code,
                    "street" => $request->street
                ]
            );
        }
        $this->deleteCart();
        $order->save();
        return redirect()->route("cart.index");
    }

    public function getCart(){
        if(Auth::user()){
            $user = User::find(Auth::id());
            if(isset($user->cart)){
                $cart = unserialize($user->cart);
            }
            else {
                $cart = [];
            }
        }
        else {
            $cart = session()->get('cart');
            if ($cart == null) {
                $cart = [];
            }
        }

        return $cart;
    }


    public function deleteCart()
    {
        if (Auth::user()) {
            $user = User::find(Auth::id());
            if (isset($user->cart)) {
                $user->cart = null;
                $user->save();
            }
        } else {
           session()->forget('cart');
        }
    }
}


