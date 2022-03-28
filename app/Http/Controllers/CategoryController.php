<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brands;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class CategoryController extends FrontendController
{
    public function getListProduct(Request $request)
    {
    	$url = $request->segment(2);
    	$url = preg_split('/(-)/i', $url);

        $min = Product::min('pro_price');
        $max = Product::max('pro_price');

        $start = $min;
        $end = $max;
        
        $products = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
        ->where('pro_active',Product::STATUS_PUBLIC);
        $cateProduct = [];
        
        $brands = Brands::select('id','b_slug','b_name','b_total_product')->where('b_active',Brands::STATUS_PUBLIC)->orderbyDesc('updated_at')->get();

        $banner = Banner::where('banner_status',Banner::STATUS_PUBLIC)->where('banner_type','=',4)->orderByDesc('updated_at')->limit(1)->get();

     	if($id = array_pop($url))
    	{
            $start = Product::where('pro_category_id',$id)->min('pro_price');
            $end = Product::where('pro_category_id',$id)->max('pro_price');

    		$products->where('pro_category_id',$id);

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

            $cateProduct = Category::find($id);
    	}
        if($request->search && !empty($request->search))
        { 
            $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.pro_category_id')
                ->join('brands', 'brands.id', '=', 'products.pro_brand_id')
                ->select('products.id','products.pro_name','products.pro_slug','products.pro_price','products.pro_sale','products.pro_qty','products.pro_avatar','products.pro_total_ratings','products.pro_total_number')
                ->where('c_name',$request->search)
                ->where('c_active',Category::STATUS_PUBLIC);
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
                $products->orWhere('b_name',$request->search)
                ->where('b_active',Brands::STATUS_PUBLIC);
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
                $products->orWhere('pro_name','like','%'.$request->search.'%')
                ->where('pro_active',Product::STATUS_PUBLIC);
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
            // $products->where('pro_name','like','%'.$request->search.'%'); 
        }
        $products = $products->paginate(12);
        
        // dd($start);
        $viewData = [
            'products' => $products,
            'brands' => $brands,
            'cateProduct' => $cateProduct,
            'start' => $start,
            'end' => $end,
            'min' => $min,
            'max' => $max,
            'banner' => $banner
        ];

        return view('product.index',$viewData);
    }
    
}
