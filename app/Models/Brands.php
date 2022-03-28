<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOME = 1;
    
    protected $status = [
    	1 => [
            'name' => 'Public',
            'class'=> 'badge-success'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'badge-secondary'
        ]
    ];

    protected $home = [
        1 => [
            'name' => 'Public',
            'class'=> 'badge-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'badge-secondary'
        ]
    ];

    public function getStatus()
    {
    	return array_get($this->status,$this->b_active,'[N\A]');
    }

    public function getHome()
    {
        return array_get($this->home,$this->b_home,'[N\A]');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'pro_brand_id');
    }
}
