<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $ordercs = Order::when($request->date != null,function($q) use($request)
                            {
                               return $q->whereDate('created_at',$request->date);
                            }, function($q) use ($todayDate){

                               return $q->whereDate('created_at',$todayDate);
                            })
                            ->when($request->status != null,function($q) use($request)
                            {
                               return $q->where('status_message',$request->status);
                            })
                            ->paginate(5);
        return view('admin.orders.Order',compact('ordercs'));
    }

    public function show(int $orderID)
    {
        // $ordercs = Order::where('id',$orderID)->first();
        $ordercs = Order::where('id',$orderID)->first();
        return view('admin.orders.OrderView',compact('ordercs'));

    }
    public function UpdateStatus(int $orderID, Request $request)
    {
        $ordercs = Order::where('id',$orderID)->first();
        if( $ordercs)
        {
            $ordercs->update([
                'status_message' => $request->orders_status
            ]);
        return redirect('adminpage/Orders/'.$orderID)->with('message','Status update to '.$request->orders_status.' is successfully');

        }
        else
        {
        return redirect('adminpage/Orders/'.$orderID)->with('message','Order ID not FOUND');

        }

    }
}
