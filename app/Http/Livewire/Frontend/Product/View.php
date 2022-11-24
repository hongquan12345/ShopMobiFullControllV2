<?php

namespace App\Http\Livewire\FrontEnd\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public function addToWishList($productID)
    {
        if(Auth::check())
        {
            //check product aready in wishlist
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productID)->exists())
            {
                session()->flash('message','Oop!! Already have this product in Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Oop!! Already have this product in Wishlist',
                    'type'=> 'warning',
                    'status'=> 399

                ]);

                return false;
            }
            else
            {
                //user firinng event
                $this->emit('WishlistUpdate');
              
                //user firinng event
                Wishlist::create([
                        'user_id' =>auth()->user()->id,
                        'product_id' =>$productID
                ]);
                session()->flash('message','Wishlist Added successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist Added successfully',
                    'type'=> 'success',
                    'status'=> 400

                ]);

            }
        }
        else
        {
            session()->flash('message','Hmm ! Please Login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Hmm ! Please Login to continue',
                'type'=> 'info',
                'status'=> 401

            ]);
            return false;
        }
    }

    public $products,$category;
    public function mount($category,$products)
    {
        $this->category = $category;
        $this->products = $products;

    }
    public function render()
    {
        $categorys = Category::all();
        $this->categorys = $categorys;
        return view('livewire.front-end.product.view',[
            'products' => $this->products,
            'category '=> $this->category,
            'categorys'=> $this->categorys,
        ]);
    }
}
