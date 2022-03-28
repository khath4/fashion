<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;
use App\Models\Category;
use App\Models\Brands;
use App\Models\Transaction;
use App\Models\Orders;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\About;

class HomeController extends FrontendController
{
    
    public function __construct()
    {
    	parent::__construct();
    }

    public function index()
    {
    	$productHot = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
        ->where([
    		'pro_hot' => Product::HOT_ON,
    		'pro_active' => Product::STATUS_PUBLIC
    	])->orderByDesc('updated_at')->limit(10)->get();

        $productRd = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
        ->where([
            'pro_hot' => Product::HOT_ON,
            'pro_active' => Product::STATUS_PUBLIC
        ])->orderByDesc('id')->inRandomOrder()->limit(10)->get();

        $NewProductHome = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
        ->where([
            'pro_active' => Product::STATUS_PUBLIC])->orderByDesc('id')
        ->limit(10)->get();

        $articleNew = Article::select('id','a_name','a_slug','a_description','a_avatar','created_at')
        ->orderBy('id','DESC')->limit(3)->get();
        
        $categoriesHome = Category::select('id','c_name',)
        ->with('products:id,pro_name,pro_slug,pro_price,pro_sale,pro_qty,pro_avatar,pro_total_number,pro_total_ratings,pro_category_id')
        ->where('c_active',Category::STATUS_PUBLIC)
        ->where('c_home',Category::HOME)->limit(3)->get();

        $BrandsHome = Brands::select('id','b_name',)
        ->with('products:id,pro_name,pro_slug,pro_price,pro_sale,pro_qty,pro_avatar,pro_total_number,pro_total_ratings,pro_brand_id')
        ->where('b_active',Brands::STATUS_PUBLIC)
        ->where('b_home',Brands::HOME)->limit(3)->get();

        $banner = Banner::select('banner_avatar','banner_link')->where('banner_status',Banner::STATUS_PUBLIC)->where('banner_type','=',4)->orderByDesc('updated_at')->limit(1)->get();

        $productSuggest = [];

        if(get_data_user('web'))
        {
            $transactions = Transaction::where([
                'tr_user_id' => get_data_user('web'),
                'tr_status' => Transaction::STATUS_DONE
            ])->pluck('id');

            if(!empty($transactions))
            {
                $list = Orders::select('id','or_product_id','or_transaction_id')
                ->whereIn('or_transaction_id',$transactions)->distinct()->pluck('or_product_id');

                if(!empty($list))
                {
                    $listCategory = Product::select('id','pro_category_id')
                    ->whereIn('id',$list)->distinct()->pluck('pro_category_id');
                    
                    if($listCategory)
                    {
                        $productSuggest = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
                        ->whereIn('pro_category_id',$listCategory)->inRandomOrder()->limit(4)->get();
                    }
                }
            }
        }

        $sliders = Slider::where('s_status',Slider::STATUS_PUBLIC)->orderByDesc('updated_at')->limit(3)->get();

    	$viewData = [
    		'productHot' => $productHot,
            'productRd' => $productRd,
            'articleNew' => $articleNew,
            'categoriesHome' => $categoriesHome,
            'BrandsHome' => $BrandsHome,
            'NewProductHome' => $NewProductHome,
            'productSuggest' => $productSuggest,
            'sliders' => $sliders,
            'banner' => $banner,
    	];
        return view('home.index',$viewData);
    }

    public function renderProductView(Request $request)
    {
        if($request->ajax())
        {
            $listID = $request->id;
            $products = Product::select('id','pro_name','pro_slug','pro_price','pro_sale','pro_qty','pro_avatar','pro_total_ratings','pro_total_number')
            ->whereIn('id',$listID)->inRandomOrder()->limit(4)->get();
            $html = view('components.products-view',compact('products'))->render();

            return response()->json(['data' => $html]);
        }
       
    }
}
