<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('frontend.UserProfile');
    }
    public function updateUserDetails(Request $request)
    {
        $request->validate([
                'username' =>['required','string'],
                'phone' =>['required','digits:10'],

                'pin_code' =>['required','digits:6'],

                'address' =>['required','string','max:499'],

        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user -> update([
            'name' => $request->username
        ]);

        $user->userDetail()->UpdateOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [

                   'phone' => $request->phone,
                   'pin_code'  =>$request->pin_code,
                  'address'   =>$request->address,
                ]
        );
        return redirect()->back()->with('message','User profile Updated');
    }
}
