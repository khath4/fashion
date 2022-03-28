<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

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

    public function getStatus()
    {
    	return array_get($this->status,$this->s_status,'[N\A]');
    }
}
