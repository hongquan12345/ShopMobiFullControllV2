<?php

namespace App\Http\Livewire\FrontEnd\Product;

use App\Models\Cart;
use Livewire\Request;
use App\Models\Comment;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class View extends Component
{
    public  $totalcomment,$products, $category,$ProdColorSelectQuantity, $QuantityCount = 1,$productColorItem;
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
                                    'text' => 'S???n ph???m m??u n??y ???? ???????c add v??o Gi??? H??ng c???a B???n ',
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
                                        $this->emit('CardAddedorUpdate');
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => '???? add S???n Ph???m V??o Gi??? H??ng',
                                            'type' => 'success',
                                            'status' => 200
                                        ]);
                                    }
                                    else
                                    {
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Ch??? c??n '.$productColor->quantity.' s???n ph???m s???n trong kho',
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);
                                    }
                                }
                                else
                                {
                                    $this->dispatchBrowserEvent('message', [
                                    'text' => 'M??u n??y ???? h???t',
                                    'type' => 'warning',
                                    'status' => 401]);
                                    return false;
                                }
                             }
                       }
                       else
                       {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'vui l??ng ch???n m??u s???n ph???m',
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
                            'text' => '???? add s???n ph???m v??o gi??? h??ng v??o ',
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
                                    $this->emit('CardAddedorUpdate');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => '???? add S???n Ph???m V??o Gi??? H??ng !',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                }
                            else
                            {

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Ch??? c??n '.$this->products->quantity.' s???n ph???m s???n trong kho',
                                    'type' => 'success',
                                    'status' => 222
                                ]);
                            }
                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message', [
                            'text' => 'H???t H??ng',
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
                'text' => 'S???n Ph???m Kh??ng T???n T???i',
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

    public function removeCommentItem(int $iDCom)
    {
        if(Auth::check())
        {
            Comment::where('user_id',auth()->user()->id)->where('id',$iDCom)->delete();
            $this->dispatchBrowserEvent('message',[
                'text' =>'Comment Successfully',
                'type' =>'success',
                'status' => 200]);

        }
        else
        {
            $this->dispatchBrowserEvent('message',[
                'text' =>'You cant Delete Comment Another Account',
                'type' =>'error',
                'status' => 200

            ]);
        }

    }

    public function addToWishListProductRelated($productID)
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
                $this->emit('WishlistUpdate');
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

        $categorys = Category::all();
        $this->categorys = $categorys;
        $this->newProducts = Product::where('status','0')->latest()->take(2)->get();
        return view('livewire.front-end.product.view', [
            'products' => $this->products,
            'category ' => $this->category,
            'categorys' => $this->categorys,
            'newProducts' => $this->newProducts,
        ]);
    }
}
