<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class AdminWarehouseController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');

        $order = 'pro_qty';

        if($request->type && $request->type == 'payDay')
        {
            $order= 'pro_pay';
            $products->whereDay('updated_at',date('d'));
            $products->where('pro_pay','>',0);
        }
        elseif($request->type && $request->type == 'payMonth')
        {
            $order= 'pro_pay';
            $products->whereMonth('updated_at',date('m'));
            $products->where('pro_pay','>',0);
        }
        elseif($request->type && $request->type == 'payYear')
        {
            $order= 'pro_pay';
            $products->whereYear('updated_at',date('Y'));
            $products->where('pro_pay','>',0);
        }
        elseif($request->type && $request->type == 'inventory-50') 
        {
            $products->where('pro_qty','>=',50);
        }
        elseif($request->type && $request->type == 'inventory-100-30') 
        {
            $time = Carbon::now();
            $month = $time->month;
            $year = $time->year;
            $products->where('pro_qty','>=',100);
            $products->whereMonth('updated_at','<',date($month));
            $products->whereYear('updated_at','<=',date($year));
        }
        else
        {
            $products->where('pro_qty','>',0);
        }   
        
        if($request->filter)
        {
            $products->where('pro_name','like','%'.$request->filter.'%');
        }
        if($request->cate)
        {
            $products->where('pro_category_id',$request->cate);
        }
        
        $products = $products->orderByDesc($order)->get();
        $categories = $this->getCategories();

        $viewData = [
            'products' => $products,
            'categories' => $categories
        ]; 
        return view('admin::warehouse.index',$viewData);
    }

    public function getCategories()
    {
        return Category::all();
    }

}
