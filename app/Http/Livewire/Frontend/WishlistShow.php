<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistShow extends Component
{
    
    public function removeWishlistItem(int $iDwish)
    {
        Wishlist::where('user_id',auth()->user()->id)->where('id',$iDwish)->delete();
        //user firinng event
        $this->emit('WishlistUpdate');
        //user firinng event

        $this->dispatchBrowserEvent('message',[
            'text' =>'WhishList Item Removed Successfully',
            'type' =>'success',
            'status' => 200

        ]);
    }
    public function showwishlist()
    {
        if(Auth::check())
        {
            $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
            return view('livewire.front-end.wishlist-show',[
                'wishlist'=>$wishlist
            ]);
        }else 
        {
            $this->dispatchBrowserEvent('message',[
                'text' =>'aaaa',
                'type' =>'success',
                'status' => 200
    
            ]);
        }
    }
    public function render()
    {
     
            $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
            return view('livewire.front-end.wishlist-show',[
                'wishlist'=>$wishlist
            ]);
        
        
    }
}
