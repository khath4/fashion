<?php

namespace App\Models;
use App\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table = 'ratings';
    protected $guarded = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class,'rt_user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'rt_product_id');
    }
}
