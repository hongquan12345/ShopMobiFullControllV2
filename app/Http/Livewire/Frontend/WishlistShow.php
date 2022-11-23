<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Wishlist;

use Livewire\Component;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $iDwish)
    {
        Wishlist::where('user_id',auth()->user()->id)->where('id',$iDwish)->delete();
        $this->dispatchBrowserEvent('message',[
            'text' =>'WhishList Item Removed Successfully',
            'type' =>'success',
            'status' => 200

        ]);
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.front-end.wishlist-show',[
            'wishlist'=>$wishlist
        ]);
    }
}
