<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brands;
use Illuminate\Support\Facades\DB;

class BrandController extends FrontendController
{
    public function getListBrand(Request $request)
    {
    	$url = $request->segment(2);
    	$url = preg_split('/(-)/i', $url);

       	$min = Product::min('pro_price');
        $max = Product::max('pro_price');

        $start = $min;
        $end = $max;

        $products = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
        ->where('pro_active',Product::STATUS_PUBLIC);

        $cateBrand = [];

        $brands = Brands::select('id','b_slug','b_name','b_total_product')->where('b_active',Brands::STATUS_PUBLIC)->orderbyDesc('updated_at')->get();

     	if($id = array_pop($url))
    	{
    		$start = Product::where('pro_brand_id',$id)->min('pro_price');
            $end = Product::where('pro_brand_id',$id)->max('pro_price');

    		$products->where('pro_brand_id',$id);

            if($request->start_price && $request->end_price && !empty($request->start_price) && !empty($request->end_price))
            {
                $start = $request->start_price;
                $end = $request->end_price;
                
                $products->whereBetween('pro_price',[$start,$end]);
            }

            if($request->status && !empty($request->status))
            {
                $status = $request->status;
                switch ($status) 
                {
                    case '2':
                        $products->where('pro_qty','=',0);
                        break;
                    default:
                        $products->where('pro_qty','>',0);
                        break;
                }
            }

            if($request->orderby && !empty($request->orderby))
            {
                $orderby = $request->orderby;
                switch ($orderby) {
                    case 'price_pay':
                        $products->orderBy('pro_pay','DESC');
                        break;
                    case 'desc':
                        $products->orderBy('id','DESC');
                        break;
                    case 'asc':
                        $products->orderBy('id','ASC');
                        break;
                    case 'price_max':
                        $products->orderBy('pro_price','ASC');
                        break;
                    case 'price_min':
                        $products->orderBy('pro_price','DESC');
                        break;
                    default:
                        $products->orderBy('pro_price','DESC');
                        break;
                }
            }

            $cateBrand = Brands::find($id);
    	}
        $products = $products->paginate(12);
        
        // dd($start);
        $viewData = [
            'products' => $products,
            'brands' => $brands,
            'cateBrand' => $cateBrand,
            'start' => $start,
            'end' => $end,
            'min' => $min,
            'max' => $max
        ];

        return view('product.brand',$viewData);
    }
}
