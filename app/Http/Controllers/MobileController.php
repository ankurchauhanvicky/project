<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Mobile;

class MobileController extends Controller
{
    public function show_customer($id)
    {
        $customer = Mobile::find($id)->customer;
        return $customer;
       //dd($customer);
        //return view('customer', ['customer'=>$customer]);
    }


}
