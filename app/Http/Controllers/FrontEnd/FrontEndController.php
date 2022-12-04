<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Slider;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function addToWishListHomePage($trending_product_id)
    {
        if(Auth::check())
            {
                //check product aready in wishlist
                if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$trending_product_id)->exists())
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
                            'product_id' =>$trending_product_id
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
    public function indexlayout()
        {
            $categorys= Category::where('status','0')->get();
            return view('layouts.index',compact('categorys'));
        }
    public function indexHomePage()
    {

        $categorys= Category::where('status','0')->take(4)->get();
        $products = Product::all();
        $trendingproducts = Product::where('trending','1')->latest()->take(15)->get();
        $newProduct = Product::latest()->take(15)->get();
        $sliders = Slider::where('status','0')->get();
        return view('frontend.Home',compact('sliders','categorys','products','trendingproducts','newProduct'));
    }

    public function categories()
    {
        $products = Product::all();
        $categorys = Category::where('status','0')->get();
        $sliders = Slider::where('status','0')->get();
        return view('frontend.Collection',compact('sliders','categorys','products'));
    }

    public function products($category_slug)
    {


        $category = Category::where('slug',$category_slug)->first();
        if($category)
        {
            //  $categorys = Category::where('status','0')->get();
            //  $products = $category->products_in_category()->get();
            //  $products =Product::orderBy('id','DESC')->paginate(10);
             return view('frontend.Product',compact('category'));
        }
        else
        {
            return redirect()->back();
        }

    }

    public function products_show(string $category_slug,string $product_slug)
    {

        $category = Category::where('slug',$category_slug)->first();
        if($category)
        {
            $products = $category->products_in_category()->where('slug',$product_slug)->where('status','0')->first();
             if($products)
             {

                return view('frontend.ProductView',compact('category','products'));
             }else
             {
                 return redirect()->back();
             }
        }
        else
        {
            return redirect()->back();
        }

    }

    public function searchProduct(Request $request)
    {
        if($request->search_txt)
        {
            $searchProduct = Product::where('name','LIKE','%'.$request->search_txt.'%')->latest()->paginate(15);
            return view('frontend.Search',compact('searchProduct'));
        }else
        {

        }
    }
    public function thankyou()
    {
        return view('frontend.thank-you');
    }

}
