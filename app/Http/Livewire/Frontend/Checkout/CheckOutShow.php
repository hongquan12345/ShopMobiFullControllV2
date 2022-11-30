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

            if($cartITEM->product_color_id != NULL)
            {
                $cartITEM->productColor_in_Cart()->where('id',$cartITEM->product_color_id)->decrement('quantity',$cartITEM->quantity);
                $cartITEM->product_in_Cart()->where('id',$cartITEM->product_id)->decrement('quantity',$cartITEM->quantity);

            }else
            {
                $cartITEM->product_in_Cart()->where('id',$cartITEM->product_id)->decrement('quantity',$cartITEM->quantity);

            }
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
            session()->flash('message','Đặt Hàng Thành Công');
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
    //test momo
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function onlOrderwithATM()
    {
        $this->payment_mode ='Cash on Online WITH ATM';
        $codOrder = $this->placeOrder();
        if($codOrder)
        {
            Cart::where('user_id',auth()->user()->id)->delete();  
        }
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $this->totalProductAmount;
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/CheckOut";
        $ipnUrl = "http://127.0.0.1:8000/CheckOut";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
                'partnerName' => "QUANKZ",
                "storeId" => "QTV STORE",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);

            $result = $this->execPostRequest($endpoint, json_encode($data));
            // dd($result);
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
            // header('Location: ' . $jsonResult['payUrl']);
           



    }

    public function onlOrderwithQR()
    {
        $this->payment_mode ='Cash on Online WITH QR';
        $codOrder = $this->placeOrder();
        if($codOrder)
            {
                 Cart::where('user_id',auth()->user()->id)->delete();

            }

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $this->totalProductAmount;
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/CheckOut";
        $ipnUrl = "http://127.0.0.1:8000/CheckOut";
        $extraData = "";
        $requestId = time() . "";
        $requestType = "captureWallet";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            // dd($result);
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
    }
    public function onlOrderWithVNPAY()
    {
        
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/thank-you";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $this->totalProductAmount;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $this->totalProductAmount * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartITEM)
        {
            $this->totalProductAmount += $cartITEM->product_in_Cart->selling_price * $cartITEM->quantity;
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
