<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    //call table
    protected $table ='categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'metal_title',
        'metal_keyword',
        'metal_description',
        'status',
    ];
   public function products_in_category()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function brands_in_category()
    {
        return $this->hasMany(Brand::class,'category_id','id')->where('status','0');
    }
}
