<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('frontend.UserProfile');
    }
     public function passwordCreate()
    {
        return view('frontend.Change-password');
    }
    public function changepassword(Request $request)
    {
        $request->validate([
            'current_Password' => ['required','string','min:8'],
            'password' => ['required','string','min:8','confirmed'],

        ]);
        $currentPasswordStatus = Hash::check($request->current_Password,auth()->user()->password);
        if($currentPasswordStatus)
        {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password)
            ]);
         return redirect()->back()->with('message','Password Updated Successfully');

        }
        else
        {
            return redirect()->back()->with('message','Current Password dont match Old Password');
        }
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
