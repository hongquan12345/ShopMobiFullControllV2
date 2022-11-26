<?php

namespace App\Http\Livewire\FrontEnd\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;
    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.front-end.cart.cart-show',[
                'cart' => $this->cart
            ]
        );
    }
}
