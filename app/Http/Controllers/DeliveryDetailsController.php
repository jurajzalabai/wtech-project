<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryDetailsController extends Controller
{
    public function index(Request $request)
    {
        return view('deliveryDetails.deliveryDetails');
    }
}
