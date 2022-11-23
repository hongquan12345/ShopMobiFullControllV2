<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhistListController extends Controller
{
    //
    public function index()
    {
        return view('frontend.Wishlist');
    }
}
