<?php

namespace App\Http\Controllers;
use App\Models\Ratings;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RatingsController extends FrontendController
{
    public function saveRatings(Request $request,$id)
    {
    	if($request->ajax())
    	{
    		Ratings::insert([
    			'rt_product_id' => $id,
    			'rt_number' => $request->number,
    			'rt_content' => $request->content,
    			'rt_user_id' => get_data_user('web'),
    			'created_at' => Carbon::now(),
            	'updated_at'=> Carbon::now(),
    		]);
    	}

    	$product = Product::find($id);
    	$product->pro_total_number += $request->number;
    	$product->pro_total_ratings += 1;

    	$product->save();

    	return response()->json(['code' => 1]);
    }
}
