<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
    public function ViewInvoice(int $orderID)
    {
        $order = Order::findOrFail($orderID);
        return view ('admin.invoice.generate-invoice',compact('order'));
    }

    public function Generatenvoice(int $orderID)
    {

        $order = Order::findOrFail($orderID);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('QTVSHOP_INVOICE-'.$order->id.'-'.$todayDate.'.pdf');

    }

    public function mailInvoice (int $orderID)
    {

        try{
            $order = Order::findOrFail($orderID);
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('/adminpage/Orders/'.$orderID)->with('message', 'Mail has been send to ' . $order->email);
        }
        catch(\Exception $e)
        {
            return redirect('/adminpage/Orders/'.$orderID)->with('message', 'Something Wrong with mail: '.$order->email);
        }
    }

}
