<?php

namespace App\Http\Livewire\FrontEnd\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;

    public function incrementQuantity(int $cartID)
    {
            $cartData = Cart::where('id',$cartID)->where('user_id',auth()->user()->id)->first();
            //check cart available
            if($cartData)
            {
                //Check product with color exist and increment
                if($cartData->productColor_in_Cart()->where('id',$cartData->product_color_id)->exists())
                {
                    $productColor =$cartData->productColor_in_Cart()->where('id',$cartData->product_color_id)->first();
                    if($productColor->quantity > $cartData->quantity)
                    {
                        $cartData->increment('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Cập nhật số lượng thành công',
                            'type' => 'success',
                            'status' => 399
                        ]);
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Sản phẩm màu này không còn đủ !
                            Vượt quá giới hạn mua',
                            'type' => 'error',
                            'status' => 399
                        ]);
                    }
                }
                //Check product with out color exist and increment
                else
                {
                    if($cartData->product_in_Cart->quantity > $cartData->quantity)
                    {
                        $cartData->increment('quantity');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Cập nhật số lượng thành công',
                            'type' => 'success',
                            'status' => 399
                        ]);
                    }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Sản phẩm không còn đủ !
                            Vượt quá giới hạn mua',
                            'type' => 'error',
                            'status' => 399
                        ]);
                    }
                }

            }
            else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Có gì đó sai !',
                    'type' => 'error',
                    'status' => 399
                ]);
            }
    }

    public function decrementQuantity(int $cartID)
    {
            // $cartData = Cart::where('id',$cartID)
            // ->where('user_id',auth()
            // ->user()->id)->first();

            // if($cartData->quantity > 0)
            // {
            //     $cartData->decrement('quantity');
            //     $this->dispatchBrowserEvent('message', [
            //         'text' => 'Quantity Updated',
            //         'type' => 'success',
            //         'status' => 399
            //     ]);
            // }
            // else
            // {
            //     $this->dispatchBrowserEvent('message', [
            //         'text' => 'That nothing you can buy',
            //         'type' => 'error',
            //         'status' => 399
            //     ]);
            // }
            $cartData = Cart::where('id',$cartID)->where('user_id',auth()->user()->id)->first();
            //check cart available
            if($cartData)
            {
                //Check product with color exist and increment
                if($cartData->productColor_in_Cart()->where('id',$cartData->product_color_id)->exists())
                {
                    if($cartData->quantity > 0)
                    {
                        $cartData->decrement('quantity');
                        $this->dispatchBrowserEvent('message', [
                                'text' => 'Cập nhật sản phẩm màu này thành công',
                                'type' => 'success',
                                'status' => 399
                            ]);
                        }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Số lượng sản phẩm màu này đang là 0',
                            'type' => 'error',
                            'status' => 399
                        ]);
                    }

                }
                else
                {

                    if($cartData->quantity > 0)
                    {
                        $cartData->decrement('quantity');
                        $this->dispatchBrowserEvent('message', [
                                'text' => 'Cập nhật sản phẩm  thành công',
                                'type' => 'success',
                                'status' => 399
                            ]);
                        }
                    else
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Số lượng sản phẩm đang là 0',
                            'type' => 'error',
                            'status' => 399
                        ]);
                    }


                }

            }
            else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Có gì đó sai !',
                    'type' => 'error',
                    'status' => 399
                ]);
            }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.front-end.cart.cart-show',[
                'cart' => $this->cart
            ]
        );
    }
}
