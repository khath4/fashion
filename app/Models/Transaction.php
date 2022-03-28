<?php

namespace App\Models;
use App\User;
use App\Models\Orders;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'tr_user_id');
    }

    const STATUS_DONE = 1;
    const STATUS_DEFAULT = 0;

    public function getStatus()
    {
    	return array_get($this->status,$this->tr_status,'[N\A]');
    }
}
