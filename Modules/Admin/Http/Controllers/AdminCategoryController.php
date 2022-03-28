<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\MenuCategory;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('MenuCategory:id,mc_name')->select('id','c_name','c_menu_category_id','c_active','c_home')->get();

        $viewdata = [
            'categories' => $categories
        ];
        return view('admin::category.index', $viewdata);
    }

    public function create()
    {
        $menus = $this->getMenus();
        return view('admin::category.create',compact('menus'));
    }

    public function store(RequestCategory $requestCategory)
    {
        $this->insert_update($requestCategory);
        return redirect()->back()->with('success','Thêm mới thành công.');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $menus = $this->getMenus();
        return view('admin::category.update',compact('category','menus'));
    }
    public function update(RequestCategory $requestCategory ,$id)
    {
        $this->insert_update($requestCategory,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }
    public function getMenus()
    {
        return MenuCategory::select('id','mc_name')->get();
    }
    public function insert_update($requestCategory ,$id='')
    {   
        $code = 1;
        try 
        {
            $category = new Category();

            if($id)
            {
                $category = Category::find($id);
            }

            $category->c_name = $requestCategory->c_name;
            $category->c_slug = str_slug($requestCategory->c_name);
            $category->c_menu_category_id = $requestCategory->c_menu_category_id;
            $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->c_name;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->save();   
        } 
        catch (Exception $e) 
        {
            $code = 0;
            Log::error("[Error insert_update Categories]".$e->getMessage());
        }
        return $code;
    }

    public function action($action,$id)
    {
        $messages = '';
        $status = 'success';
        if($action)
        {
            $category = Category::find($id);
            switch ($action) {
                case 'delete':
                    $products = Product::where('pro_category_id',$category->id)->get()->toArray();
                    if($products == NULL)
                    {
                        $category->delete();
                        $messages = 'Xóa thành công.';
                        break;
                    }
                    else
                    {
                        $messages = 'Danh mục đang có sản phẩm, Không thể xóa.';
                        $status = 'error';   
                        break;
                    }
                case 'active':
                    $category->c_active = $category->c_active ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $category->save();
                    break;
                case 'home':
                    $category->c_home = $category->c_home ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $category->save();
                    break;
            }
        }
        return redirect()->back()->with($status,$messages);
    }
}

