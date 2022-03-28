<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table= 'contact';
    protected $guarded = ['*'];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
    	1 => [
    		'name' => 'Đã xữ lý',
    		'class'=> 'badge-success'
    	],
    	0 => [
    		'name' => 'Chờ xữ lý',
    		'class' => 'badge-secondary'
    	]
    ];

    public function getStatus()
    {
    	return array_get($this->status,$this->ct_status,'[N\A]');
    }
}
