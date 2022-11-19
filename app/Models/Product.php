<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\ProductColors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $table ='products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'metal_title',
        'metal_keyword',
        'metal_description',
    ];
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function productImage()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productColors()
    {
        return $this->hasMany(ProductColors::class,'product_id','id');

    }
}
