<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Mobile;

class Indexcontroller extends Controller
{
    public function index($id)
    {
        // $customer= Customer::find($id);
        // var_dump($customer->name);
        // var_dump($customer->email);
        // var_dump($customer->mobile->model);

        // $customer = Mobile::find($id)->customer;
        // dd($customer);

        $mobile = Customer::find($id)->mobile;
        var_dump($mobile);

    }
}
