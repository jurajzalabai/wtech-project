<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingPaymentController extends Controller
{
    public function index()
    {
        return view('shippingPayment.shippingPayment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('deliveryDetails.index', ['cart'=>$request]);
    }
}
