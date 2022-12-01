<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function indexlayout()
        {
            $categorys= Category::where('status','0')->get();
            return view('layouts.index',compact('categorys'));
        }
    public function indexHomePage()
    {
        $categorys = Category::where('status','0')->first()->take(6)->get();
        $products = Product::all();
        $trendingproducts = Product::where('trending','1')->latest()->take(2)->get();
        $sliders = Slider::where('status','0')->get();
        return view('frontend.Home',compact('sliders','categorys','products','trendingproducts'));
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
    public function thankyou()
    {
        return view('frontend.thank-you');
    }

}
