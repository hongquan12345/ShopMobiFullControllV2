<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table ='carts';
    protected $fillable =[
        'user_id',
        'product_id',
        'product_color_id',
        'quantity',
    ];
    public function product_in_Cart():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function productColor_in_Cart():BelongsTo
    {
        return $this->belongsTo(ProductColors::class,'product_color_id','id');
    }
}
