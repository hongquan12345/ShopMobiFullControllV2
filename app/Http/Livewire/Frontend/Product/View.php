<?php

namespace App\Http\Livewire\FrontEnd\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $products, $category,$ProdColorSelectQuantity, $QuantityCount = 1,$productColorItem;
    public function addToWishList($productID)
    {
        if (Auth::check()) {
            //check product aready in wishlist
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productID)->exists()) {
                session()->flash('message', 'Oop!! Already have this product in Wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Oop!! Already have this product in Wishlist',
                    'type' => 'warning',
                    'status' => 399

                ]);

                return false;
            } else {
                //user firinng event
                $this->emit('WishlistUpdate');

                //user firinng event
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productID
                ]);
                session()->flash('message', 'Wishlist Added successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist Added successfully',
                    'type' => 'success',
                    'status' => 400

                ]);
            }
        } else {
            session()->flash('message', 'Hmm ! Please Login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Hmm ! Please Login to continue',
                'type' => 'info',
                'status' => 401

            ]);
            return false;
        }
    }
    public function colorSelected($productColorItem)
    {
        $this->productColorItem = $productColorItem;
        $productColor = $this->products->productColors()->where('id',$productColorItem)->first();
        $this->ProdColorSelectQuantity = $productColor->quantity;
        if($this->ProdColorSelectQuantity == 0)
        {
            $this->ProdColorSelectQuantity = 'outOfStock';
        }   
    }
    public function addtoCart(int $product_id)
    {
        //check login
        if (Auth::check())
        {  
            if ($this->products->where('id', $product_id)->where('status','0')->exists()) 
            {   //check for Product have Color Quantity and add tp cart
                if($this->products->productColors()->count() > 1)
                {
                       if($this->ProdColorSelectQuantity != NULL)
                       {
                            if(Cart::where('user_id',auth()->user()->id)
                            ->where('product_id',$product_id)
                            ->where('product_color_id',$this->productColorItem)
                            ->exists())
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Sản phẩm màu này đã được add vào Giỏ Hàng của Bạn ',
                                    'type' => 'warning',
                                    'status' => 401 ]);
                                    return false;
                            }
                            else
                            {
                                $productColor = $this->products->productColors()->where('id',$this->productColorItem)->first();
                                if( $productColor->quantity > 0)
                                {
                                    if($productColor->quantity >= $this->QuantityCount)
                                    {
                                    
                                        Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $product_id,
                                            'product_color_id'=> $this->productColorItem,
                                            'quantity' => $this->QuantityCount
                                        ]);
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Đã add Sản Phẩm Vào Giỏ Hàng',
                                            'type' => 'success',
                                            'status' => 200
                                        ]);
                                    } 
                                    else
                                    {      
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Chỉ còn '.$productColor->quantity.' sản phẩm sẳn trong kho',
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);   
                                    }
                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                    'text' => 'Màu này đã hết',
                                    'type' => 'warning',
                                    'status' => 401]);
                                    return false;
                                }
                             }
                       }
                       else
                       {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'vui lòng chọn màu sản phẩm',
                            'type' => 'warning',
                            'status' => 401]);
                            return false;
                       }
                }
                //check for Product dont have Color Quantity and add tp cart
                else
                {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$product_id)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Đã add sản phẩm vào giỏ hàng vào ',
                            'type' => 'warning',
                            'status' => 401 ]);
                            return false;
                    }
                    else
                    {
                        if ($this->products->quantity > 0) 
                        {   
                            if($this->products->quantity > $this->QuantityCount)
                                {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $product_id,
                                        
                                        'quantity' => $this->QuantityCount
                                    ]);
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Đã add Sản Phẩm Vào Giỏ Hàng !',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }
                            else
                            {
                                    
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Chỉ còn '.$this->products->quantity.' sản phẩm sẳn trong kho',
                                    'type' => 'success',
                                    'status' => 222
                                ]);   
                            }
                        }
                        else 
                        {
                            $this->dispatchBrowserEvent('message', [
                            'text' => 'Hết Hàng',
                            'type' => 'warning',
                            'status' => 401]);
                            return false;
                        }
                    }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                'text' => 'Sản Phẩm Không Tồn Tại',
                'type' => 'warning',
                'status' => 401 ]);
                return false;
            }
        } 
        else 
        {
            session()->flash('message', 'Hmm ! Please Login to continue');
            $this->dispatchBrowserEvent('message', [
            'text' => 'Hmm ! Please Login to continue',
            'type' => 'info',
            'status' => 401

            ]);
            return false;
        }
    }
    public function incrementQuantity()
    {
        if ($this->QuantityCount < 10) {
            $this->QuantityCount++;
        } else {
            $this->QuantityCount = 10;
        }
    }
    public function decrementQuantity()
    {
        if ($this->QuantityCount > 0) {
            $this->QuantityCount--;
        } else {
            $this->QuantityCount = 0;
            return false;
        }
    }
    public function mount($category, $products)
    {
        $this->category = $category;
        $this->products = $products;
    }
    public function render()
    {
        $categorys = Category::all();
        $this->categorys = $categorys;
        return view('livewire.front-end.product.view', [
            'products' => $this->products,
            'category ' => $this->category,
            'categorys' => $this->categorys,
        ]);
    }
}
