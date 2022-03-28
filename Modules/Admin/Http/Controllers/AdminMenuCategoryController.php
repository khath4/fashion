<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\MenuCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\MenuCategory;

class AdminMenuCategoryController extends Controller
{
    public function index()
    {
        $menu_categories = MenuCategory::select('id','mc_name','mc_status')->get();

        $viewdata = [
            'menu_categories' => $menu_categories
        ];
        return view('admin::menu-category.index', $viewdata);
    }

    public function create()
    {
        return view('admin::menu-category.create');
    }

    public function store(MenuCategoryRequest $requestCategoryMenu)
    {
        $this->insert_update($requestCategoryMenu);
        return redirect()->back()->with('success','Thêm mới thành công.');
    }
    public function edit($id)
    {
        $categoryMenu = MenuCategory::find($id);
        return view('admin::menu-category.update',compact('categoryMenu'));
    }
    public function update(MenuCategoryRequest $requestCategoryMenu ,$id)
    {
        $this->insert_update($requestCategoryMenu,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }
    
    public function insert_update($requestCategoryMenu ,$id='')
    {   
        $code = 1;
        try 
        {
            $categoryMenu = new MenuCategory();

            if($id)
            {
                $categoryMenu = MenuCategory::find($id);
            }

            $categoryMenu->mc_name = $requestCategoryMenu->mc_name;
            $categoryMenu->mc_slug = str_slug($requestCategoryMenu->mc_name);
            $categoryMenu->mc_title_seo = $requestCategoryMenu->mc_title_seo ? $requestCategoryMenu->mc_title_seo : $requestCategoryMenu->mc_name;
            $categoryMenu->mc_description_seo = $requestCategoryMenu->mc_description_seo;
            $categoryMenu->save();   
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
            $categoryMenu = MenuCategory::find($id);
            switch ($action) {
                case 'delete':
                    $Category = Category::where('c_menu_category_id',$categoryMenu->id)->get()->toArray();
                    if($Category == NULL)
                    {
                        $categoryMenu->delete();
                        $messages = 'Xóa thành công.';
                        break;
                    }
                    else
                    {
                        $messages = 'Menu đã có danh mục không thể xóa.';
                        $status = 'error';   
                        break;
                    }
                case 'status':
                    $categoryMenu->mc_status = $categoryMenu->mc_status ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $categoryMenu->save();
                    break;
            }
        }
        return redirect()->back()->with($status,$messages);
    }
}
