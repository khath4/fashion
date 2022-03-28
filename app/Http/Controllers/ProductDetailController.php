<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brands;
use App\Models\Ratings;
use App\Models\Orders;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends FrontendController
{
    public function productDetail(Request $request)
    {
    	$url = $request->segment(2);
    	$url = preg_split('/(-)/i',$url);

    	if($id = array_pop($url))
    	{
    		$productDetail = Product::where('pro_active',Product::STATUS_PUBLIC)->find($id);
            
            if(!empty($productDetail->pro_category_id))
            {
                $cateProduct = Category::select('id','c_name','c_slug')->find($productDetail->pro_category_id);
                $brand = Brands::select('id','b_name','b_slug')->find($productDetail->pro_brand_id);

                $NewProductHome = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
                ->where([
                    'pro_category_id' => $productDetail->pro_category_id,
                    'pro_active' => Product::STATUS_PUBLIC])->orderByDesc('id')
                ->limit(10)->get();

                $ratings = Ratings::with('user:id,name,avatar')->where('rt_product_id',$id)->orderBy('id','DESC')->paginate(20);

                $ratingsDashboard = Ratings::groupBy('rt_number')->where('rt_product_id',$id)
                ->select(DB::raw('count(rt_number) as total'),DB::raw('sum(rt_number) as sum'))
                ->addSelect('rt_number')->get()->toArray();

                $arrayRatings = [];
                if(!empty($ratingsDashboard))
                {
                    for($i = 1; $i <= 5 ; $i++)
                    {
                        $arrayRatings[$i] = [
                            "total" => 0,
                            "sum" => 0,
                            "rt_number" => 0
                        ];
                        foreach ($ratingsDashboard as $item) 
                        {
                            if($item['rt_number'] == $i)
                            {
                                $arrayRatings[$i] = $item;
                                continue;
                            }    
                        }
                    }
                }

                $check = 0;

                $check_transaction = Transaction::select('id')->where('tr_user_id',get_data_user('web'))->where('tr_status',Transaction::STATUS_DONE)->get();
                
                foreach ($check_transaction as $key => $value) 
                {
                    $check_orders = Orders::where('or_product_id',$id)->where('or_transaction_id',$value->id)->get()->toArray();   
                    if($check_orders)
                    {
                        $check = 1;
                    }
                }

        		$viewData = [
        			'productDetail' => $productDetail,
                    'cateProduct' => $cateProduct,
                    'brand' => $brand,
                    'ratings' => $ratings,
                    'arrayRatings' => $arrayRatings,
                    'NewProductHome' => $NewProductHome,
                    'check' => $check
        		];

        		return view('product.detail',$viewData);
            }
            return redirect()->route('home');  
    	}
    }

}
