<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request )
        {
            if(Auth::check())
            {
                    $validator = Validator::make($request->all(),[
                        'comment_body' => 'required|string'
                    ]);
                    if($validator ->fails())
                    {
                        return redirect()->back()->with('message', 'Comment Area is not fuound');
                    }
                    else
                    {
                        $product = Product::where('slug', $request->products_slug)->where('status', '0')->first();
                        if($product)
                        {
                            Comment::create([
                                'post_id' => $product->id,
                                'user_id' => Auth::user()->id,
                                'comment_body' =>$request->comment_body,
                                ]);
                                return redirect()->back()->with('message', 'Comment successfully');
                        }
                        else
                        {
                            return redirect()->back()->with('message', 'No SUch Product Found');
                        }
                    }

            }
            else
            {

                return redirect('login')->with('message', 'Login First');
            }
        }
    
}
