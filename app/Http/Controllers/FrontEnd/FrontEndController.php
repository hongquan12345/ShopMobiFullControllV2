<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function indexHomePage()
    {
        $categorys = Category::where('status','0')->get();
        $sliders = Slider::where('status','0')->get();
        return view('frontend.Home',compact('sliders','categorys'));
    }
    
}
