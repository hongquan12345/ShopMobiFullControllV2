<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public  $wishlistCount;
    //user firinng event
    protected $listeners = ['WishlistUpdate' => 'checkwishlistCount'];
    //user firinng event
    public function checkwishlistCount()
    {
        if(Auth::check())
        {
            return $this->wishlistCount = Wishlist::where('user_id',auth()->user()->id)->count();
        }
        else
        {
            $this->wishlistCount = 0;
        }

    }
    public function render()
    {
        $this->wishlistCount = $this->checkwishlistCount();
        return view('livewire.front-end.wishlist.wishlist-count',[
            'wishlistCount'=> $this->wishlistCount
        ]);
    }
}
