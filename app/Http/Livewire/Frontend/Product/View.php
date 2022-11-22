<?php

namespace App\Http\Livewire\FrontEnd\Product;

use App\Models\Category;
use Livewire\Component;

class View extends Component
{
    public $products,$category;
    public function mount($category,$products)
    {
        $this->category = $category;
        $this->products = $products;

    }
    public function render()
    {
        $categorys = Category::all();
        $this->categorys = $categorys;
        return view('livewire.front-end.product.view',[
            'products' => $this->products,
            'category '=> $this->category,
            'categorys'=> $this->categorys,

        ]);
    }
}
