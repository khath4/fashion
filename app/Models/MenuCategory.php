<?php 

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $table = 'menu_categories';
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

   
    public function getStatus()
    {
    	return array_get($this->status,$this->mc_status,'[N\A]');
    }

    public function Category()
    {
        return $this->hasMany(Category::class,'c_menu_category_id');
    }
}
