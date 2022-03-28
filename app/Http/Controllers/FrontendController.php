<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MenuCategory;
use App\Models\Banner;
use App\Models\About;
use Illuminate\Support\Facades\View;
use App\User;

class FrontendController extends Controller
{
    public function __construct()
    {
        $menuCategory = MenuCategory::with('category')->where('mc_status',MenuCategory::STATUS_PUBLIC)->orderByDesc('updated_at')->limit(3)->get();

    	$footer = Banner::select('banner_avatar','banner_link')->where('banner_status',Banner::STATUS_PUBLIC)->where('banner_type','=',1)->orderByDesc('updated_at')->limit(6)->get();
        $footer_category = Banner::select('banner_avatar',)->where('banner_status',Banner::STATUS_PUBLIC)->where('banner_type','=',5)->orderByDesc('updated_at')->limit(1)->get();
        $info = About::find(1); 

    	$viewData = [
            'menuCategory'=> $menuCategory,
            'footer_category' => $footer_category,
            'footer' => $footer,
    		'info' => $info
    	];
    	View::share($viewData);
    }
}
