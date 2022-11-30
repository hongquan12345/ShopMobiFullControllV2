<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    use HasFactory;
    protected $table ='order';
    protected $fillable = [
        'user_id',
        'tracking_no',
        'fullname',
        'email',
        'phone',
        'pincode',
        'address',
        'status_message',
        'payment_mode',
        'payment_id',
    ];
    /**
     * Get all of the orderItem_inOrder for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItem_inOrder(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

}
