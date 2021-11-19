<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingPaymentController extends Controller
{
    public function index()
    {
        return view('shippingPayment.shippingPayment');
    }

    public function create(Request $request)
    {
//        $order = Order::create([
//            "transaction_method" => $request->input('payment'),
//            "delivery_method" => $request->input('delivery'),
//            "cart" => $this->getCart(),
//        ]);

        $payment = null;
        $delivery = null;
        $doprava = array("balikbox", "zasielkovna", "kurierom", "slovenska-posta");
        $platba = array("kreditna-karta", "prevod-na-ucet", "na-dobierku");
        foreach ($doprava as $item){
            if($item == $request->input('doprava'))
                $delivery = $request->input('doprava');
            }
        foreach ($platba as $item){
            if($item == $request->input('platba'))
                $payment = $request->input('platba');
        }

        if($delivery and $payment){
            return redirect()->route('deliveryDetails.index', ['platba'=>$payment, 'doprava'=>$delivery]);
        }
        return redirect()->back();
        //
//        return route('deliveryDetails', ['order'=>$order]);
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

//

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request): \Illuminate\Http\Response
//    {
//        //
//        $cart = $this->getCart();
//        return redirect()->route('deliveryDetails.deliveryDetails', ['cart'=>$cart]);
////        return view('deliveryDetails.deliveryDetails', ['cart'=>$cart]);
//    }
}
