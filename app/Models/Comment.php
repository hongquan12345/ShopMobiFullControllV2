<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'comment_body',
    ];
    public function Comment_in_Product()
    {
        return $this->belongsTo(Product::class, 'post_id', 'id');
    }
    public function Comment_in_User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
