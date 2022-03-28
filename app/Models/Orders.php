<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $guarded = [''];

    public function product()
    {
    	return $this->belongsTo(Product::class,'or_product_id');
    }

    public function transaction()
    {
    	return $this->belongsTo(Transaction::class,'or_transaction_id');
    }
}
