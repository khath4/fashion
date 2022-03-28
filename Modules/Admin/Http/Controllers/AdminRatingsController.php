<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Ratings;

class AdminRatingsController extends Controller
{
    public function index()
    {
        $ratings = Ratings::with('user:id,name','product:id,pro_name,pro_slug')->get();

        $viewData = [
            'ratings' => $ratings
        ];
        return view('admin::ratings.index',$viewData);
    }

}
