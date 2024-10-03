<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;

class MainCustomerController extends Controller
{
    public function index()
    {
        return view('customer.home');
    }
}
