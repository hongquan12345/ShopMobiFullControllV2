<?php

namespace App\Http\Livewire\FrontEnd\Product;


use App\Models\Product;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $products,$category, $brandInputs = [],$priceInputs;
    protected $queryString = [
        'brandInputs' =>['except'=>'','as'=>'brand'],
        'priceInputs' =>['except'=>'','as'=>'price'],

        ];

    public function mount($category)
    {
        $this->category = $category;
    }

    public function addToWishListIndext($productID)
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


    public function render()
    {

        $this->products = Product::where('category_id',$this->category->id)
                            ->when($this->brandInputs,function ($q){
                                    $q->whereIn('brand',$this->brandInputs);
                            })
                            ->when($this->priceInputs,function ($a)
                            {
                                $a->when($this->priceInputs =='hight-to-low',function ($a2)
                                {
                                    $a2->orderBy('selling_price','DESC');
                                })->when($this->priceInputs =='low-to-hight',function ($a2)
                                {
                                    $a2->orderBy('selling_price','ASC');
                                });
                            })
                            ->where('status','0')
                            ->get();
        return view('livewire.front-end.product.index',[
            'products' => $this->products,
            'category '=> $this->category

        ]);
    }
}
