<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brands;

class AdminProductController extends Controller
{
   
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name')->with('brand:id,b_name');

        if($request->filter)
        {
            $products->where('pro_name','like','%'.$request->filter.'%');
        }
        if($request->cate)
        {
            $products->where('pro_category_id',$request->cate);
        }

        if($request->brand)
        {
            $products->where('pro_brand_id',$request->brand);
        }
        
        $products = $products->orderByDesc('id')->get();

        $categories = $this->getCategories();
        $brands = $this->getBrands();

        $viewData = [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]; 

        return view('admin::product.index',$viewData);
    }

    public function create()
    {
        $categories = $this->getCategories();
        $brands = $this->getBrands();
        return view('admin::product.create',compact('categories','brands'));
    }

    public function getCategories()
    {
        return Category::select('id','c_name')->get();
    }

    public function getBrands()
    {
        return Brands::select('id','b_name')->get();
    }

    public function store(RequestProduct $requestProduct)
    {
        $this->insert_update($requestProduct);

        $category = Category::find($requestProduct->pro_category_id);
        $category->c_total_product += 1;
        $category->save();

        $brand = Brands::find($requestProduct->pro_brand_id);
        $brand->b_total_product += 1;
        $brand->save();

        return redirect()->back()->with('success','Thêm mới thành công.'); 
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = $this->getCategories();
        $brands = $this->getBrands();

        return view('admin::product.update' ,compact('product','categories','brands'));
    }

    public function update(RequestProduct $requestProduct,$id)
    {
        $this->insert_update($requestProduct,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }

    public function insert_update($requestProduct,$id='')
    {
        $product = new Product();
        if($id) 
        {
            $product = Product::find($id);

            if($product->pro_category_id != $requestProduct->pro_category_id)
            {
                $category_old = Category::find($product->pro_category_id);
                if(!empty($category_old))
                {
                    $total_old = Product::where('pro_category_id',$product->pro_category_id)
                    ->where('pro_active',Product::STATUS_PUBLIC)->count('id');
                    $category_old->c_total_product = $total_old - 1;
                    $category_old->save();
                }
                
                $category = Category::find($requestProduct->pro_category_id);
                if(!empty($category))
                {
                    $total_new = Product::where('pro_category_id',$requestProduct->pro_category_id)
                    ->where('pro_active',Product::STATUS_PUBLIC)->count('id');
                    $category->c_total_product = $total_new + 1;
                    $category->save();
                }
            }

            if($product->pro_brand_id != $requestProduct->pro_brand_id)
            {
                $brand_old = Brands::find($product->pro_brand_id);
                if(!empty($brand_old))
                {
                    $total_old2 = Product::where('pro_brand_id',$product->pro_brand_id)
                    ->where('pro_active',Product::STATUS_PUBLIC)->count('id');
                    $brand_old->b_total_product = $total_old2 - 1;
                    $brand_old->save();
                }
                
                $brand = Brands::find($requestProduct->pro_brand_id);
                if(!empty($brand))
                {
                    $total_new2 = Product::where('pro_brand_id',$requestProduct->pro_brand_id)
                    ->where('pro_active',Product::STATUS_PUBLIC)->count('id');
                    $brand->b_total_product = $total_new2 + 1;
                    $brand->save();
                }
            }
        }
        
        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = str_slug($requestProduct->pro_name);
        $product->pro_category_id = $requestProduct->pro_category_id;
        $product->pro_brand_id = $requestProduct->pro_brand_id;
        $product->pro_price = $requestProduct->pro_price;
        $product->pro_qty = $requestProduct->pro_qty;
        $product->pro_sale = $requestProduct->pro_sale;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
        $product->pro_description_seo = $requestProduct->pro_description_seo ? $requestProduct->pro_description_seo : $requestProduct->pro_description;

        if($requestProduct->hasFile('pro_avatar'))
        {
            $file = upload_image('pro_avatar');
            if(isset($file['name']))
            {
                $product->pro_avatar = $file['name'];
            }
        }

        $product->save();
    }
    public function action($action,$id)
    {
        $messages = '';
        if($action)
        {
            $product = Product::find($id);
            switch ($action) {
                case 'delete':
                    $product->delete();
                    $messages = 'Xóa thành công.';
                    break;
                case 'active':
                    $category = Category::find($product->pro_category_id);
                    $brand = Brands::find($product->pro_brand_id);
                    if($product->pro_active == 0)
                    {
                        $category->c_total_product += 1;
                        $brand->b_total_product += 1;
                    }
                    else
                    {
                        $category->c_total_product -= 1;
                        $brand->b_total_product -= 1;
                    }
                    $category->save();
                    $brand->save();
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $product->save();
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $product->save();
                    break;    
            }
        }
        return redirect()->back()->with('success',$messages);
    }

}
