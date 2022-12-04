<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table ='order_items';
    protected $fillable =[
        'order_id',
        'product_id',
        'product_color_id',
        'quantity',
        'price',
    ];
    /**
     * Get the Product that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_in_OrderItem(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    /**
     * Get the Product that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productColor_in_OrderItem(): BelongsTo
    {
        return $this->belongsTo(ProductColors::class, 'product_color_id', 'id');
    }
  
}
