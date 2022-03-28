<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\BrandsRequest;
use App\Models\Brands;

class AdminBrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::select('id','b_name','b_title_seo','b_active','b_home')->get();

        $viewdata = [
            'brands' => $brands
        ];
        return view('admin::brand.index', $viewdata);
    }

    public function create()
    {
        return view('admin::brand.create');
    }

    public function store(BrandsRequest $requestBrand)
    {
        $this->insert_update($requestBrand);
        return redirect()->back()->with('success','Thêm mới thành công.');
    }
    public function edit($id)
    {
        $brand = Brands::find($id);
        return view('admin::brand.update',compact('brand'));
    }
    public function update(BrandsRequest $requestBrand ,$id)
    {
        $this->insert_update($requestBrand,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }

    public function insert_update($requestBrand ,$id='')
    {   
        
        $brand = new Brands();

        if($id)
        {
            $brand = Brands::find($id);
        }

        $brand->b_name = $requestBrand->b_name;
        $brand->b_slug = str_slug($requestBrand->b_name);
        $brand->b_title_seo = $requestBrand->b_title_seo ? $requestBrand->b_title_seo : $requestBrand->b_name;
        $brand->b_description_seo = $requestBrand->b_description_seo;
        $brand->save();   
    }

    public function action($action,$id)
    {
        $messages = '';
        if($action)
        {
            $brand = Brands::find($id);
            switch ($action) {
                case 'delete':
                    $brand->delete();
                    $messages = 'Xóa thành công.';
                    break;
                case 'active':
                    $brand->b_active = $brand->b_active ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $brand->save();
                    break;
                case 'home':
                    $brand->b_home = $brand->b_home ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $brand->save();
                    break;
            }
        }
        return redirect()->back()->with('success',$messages);
    }
}
