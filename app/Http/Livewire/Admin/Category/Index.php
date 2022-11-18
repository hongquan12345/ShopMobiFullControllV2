<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component

{
    use WithPagination;
    public $catagory_public_id;
    protected $paginationTheme= 'bootstrap';

    
    public function deleteCatagory($catagory_id)
    {
        $this->catagory_public_id = $catagory_id;
    }

    public function destroyCategory()
    {
       $category = Category::find($this->catagory_public_id);
       $path = 'uploads/Category/'.$category->image;
       if(File::exists($path))
       {
           File::delete($path);
       }
       $category->delete();
       session()->flash('message','Catagory Deleted');
       $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $categories= Category::orderBy('id','DESC')->paginate(4);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
    
}
