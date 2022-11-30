<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $ordercs = Order::where('user_id',Auth::user()->id)->orderBy('created_at','asc')->paginate(10);
        return view('frontend.Order',compact('ordercs'));
    }
    public function showOrderID($orderID)
    {
        $ordercs = Order::where('user_id',Auth::user()->id)->where('id',$orderID)->first();
        if($ordercs)
        {
          return view('frontend.OrderView',compact('ordercs'));
        }
        else{
            return redirect()->back()->with('message','No Order Found');
        }
    }
} 
