<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Mobile;
class CustomerController extends Controller
{
    public function add_customer()
    {
        $mobile= new Mobile();
        $mobile->mobilename = 'realme';
        $mobile->model = 'Az23';
       
        $customer= new Customer();
        $customer->name= 'Vivek';
        $customer->email= 'vivek12@gmail.com';
        $customer->save();

        $customer->mobile()->save($mobile);
    }

    public function show_mobile($id)
    {
        $mobile = Customer::find($id)->mobile;
        return $mobile;
        //dd($mobile);
        //return view('mobile', ['mobile' => $mobile]);
    }

}
