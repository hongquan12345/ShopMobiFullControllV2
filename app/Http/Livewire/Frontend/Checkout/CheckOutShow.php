<?php

namespace App\Http\Livewire\FrontEnd\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;

class CheckOutShow extends Component
{
    public $carts, $totalProductAmount = 0;

    public $full_name,$email,$phone,$pin_code,$address,$payment_mode = NULL,$payment_id = NULL;

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pin_code' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' =>auth()->user()->id,
            'tracking_no' => 'Qkz-'.Str::random(10),
            'fullname' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pin_code,
            'address' => $this->address,
            'status_message' =>'in Progress',
            'payment_mode' => $this->payment_mode,
            'payment_id'=> $this->payment_id ,

        ]);

        foreach ($this->carts as $cartITEM)
        {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id'=>$cartITEM->product_id,
                'product_color_id'=>$cartITEM->product_color_id,
                'quantity'=>$cartITEM->quantity,
                'price'=>$cartITEM->product_in_Cart->selling_price,
            ]);

            $this->totalProductAmount += $cartITEM->product_in_Cart->selling_price * $cartITEM->quantity;

        }

        return $order;
    }


    public function codOrder()
    {
        $this->payment_mode ='Cash on Delivery';
        $codOrder = $this->placeOrder();
        if($codOrder)
        {
            Cart::where('user_id',auth()->user()->id)->delete();

            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Place success',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Some thing went Wrong',
                'type' => 'error',
                'status' => 333
            ]);
        }
    }


    public function totalProductAmount()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartITEM)
        {
            $this->totalProductAmount = $cartITEM->product_in_Cart->selling_price * $cartITEM->quantity;
            // $this->totalProductAmount += $cartITEM->product_in_Cart->selling_price * $cartITEM->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        //get default data name and email of user register
        $this->full_name = auth()->user()->name;
        $this->email = auth()->user()->email;


        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.front-end.checkout.check-out-show',[
            'totalProductAmount' =>$this->totalProductAmount,
        ]);
    }
}
