<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;

class AdminBannerController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::get();

        $viewData = [
            'banners' => $banners
        ];

        return view('admin::banner.index',$viewData);
    }

    public function create()
    {
        return view('admin::banner.create');
    }

    public function store(BannerRequest $requestBanner)
    {
        $this->insert_update($requestBanner);
        return redirect()->back()->with('success','Thêm mới thành công.');
    }

    public function edit($id)
    {   
        $banner =  Banner::find($id);
        return view('admin::banner.update',compact('banner'));
    }

    public function update(BannerRequest $requestBanner,$id)
    {
        $this->insert_update($requestBanner,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }

    public function insert_update($requestBanner,$id='')
    {
        $banner = new Banner();

        if($id)
        {
            $banner = Banner::find($id);
        }

        $banner->banner_type = $requestBanner->banner_type;
        $banner->banner_link = $requestBanner->banner_link;

        if($requestBanner->hasFile('banner_avatar'))
        {
            $file = upload_image('banner_avatar');
            if(isset($file['name']))
            {
                $banner->banner_avatar = $file['name'];
            }
        }
        
        $banner->save(); 
    }
    public function action($action,$id)
    {
        $messages = '';
        if($action)
        {
            $banner = Banner::find($id);
            switch ($action) {
                case 'delete':
                    $banner->delete();
                    $messages = 'Xóa thành công.';
                    break;
                case 'active':
                    $banner->banner_status = $banner->banner_status ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $banner->save();
                    break;      
            }
            
        }
        return redirect()->back()->with('success',$messages);
    }
}
