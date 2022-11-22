<?php

namespace App\Http\Livewire\FrontEnd\Product;


use App\Models\Product;

use Livewire\Component;

class Index extends Component
{
    public $products,$category, $brandInputs = [],$priceInputs;
    protected $queryString = [
        'brandInputs' =>['except'=>'','as'=>'brand'],
        'priceInputs' =>['except'=>'','as'=>'price'],

        ];

    public function mount($category)
    {
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id',$this->category->id)
                            ->when($this->brandInputs,function ($q){
                                    $q->whereIn('brand',$this->brandInputs);
                            })
                            ->when($this->priceInputs,function ($a)
                            {
                                $a->when($this->priceInputs =='hight-to-low',function ($a2)
                                {
                                    $a2->orderBy('selling_price','DESC');
                                })->when($this->priceInputs =='low-to-hight',function ($a2)
                                {
                                    $a2->orderBy('selling_price','ASC');
                                });
                            })
                            ->where('status','0')
                            ->get();
        return view('livewire.front-end.product.index',[
            'products' => $this->products,
            'category '=> $this->category

        ]);
    }
}
