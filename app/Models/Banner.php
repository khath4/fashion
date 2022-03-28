<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
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
    	return array_get($this->status,$this->banner_status,'[N\A]');
    }
}
