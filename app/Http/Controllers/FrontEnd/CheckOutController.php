<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        return view('frontend.CheckOut');
    }




    public function MOMO_PAYMENT()
    {
        return view('frontend.MOMO_PAYMENT');
    }

}
