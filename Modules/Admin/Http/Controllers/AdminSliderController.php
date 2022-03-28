<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;

class AdminSliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::get();

        $viewData = [
            'sliders' => $sliders
        ];

        return view('admin::slider.index',$viewData);
    }

    public function create()
    {
        return view('admin::slider.create');
    }

    public function store(SliderRequest $requestSlider)
    {
        $this->insert_update($requestSlider);
        return redirect()->back()->with('success','Thêm mới thành công.');
    }

    public function edit($id)
    {   
        $slider =  Slider::find($id);
        return view('admin::slider.update',compact('slider'));
    }

    public function update(SliderRequest $requestSlider,$id)
    {
        $this->insert_update($requestSlider,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }

    public function insert_update($requestSlider,$id='')
    {
        $slider = new Slider();

        if($id)
        {
            $slider = Slider::find($id);
        }

        $slider->s_title = $requestSlider->s_title;
        $slider->s_description = $requestSlider->s_description;
        $slider->s_link = $requestSlider->s_link;

        if($requestSlider->hasFile('s_avatar'))
        {
            $file = upload_image('s_avatar');
            if(isset($file['name']))
            {
                $slider->s_avatar = $file['name'];
            }
        }
        
        $slider->save(); 
    }
    public function action($action,$id)
    {
        $messages = '';
        if($action)
        {
            $slider = Slider::find($id);
            switch ($action) {
                case 'delete':
                    $slider->delete();
                    $messages = 'Xóa thành công.';
                    break;
                case 'active':
                    $slider->s_status = $slider->s_status ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $slider->save();
                    break;      
            }
            
        }
        return redirect()->back()->with('success',$messages);
    }
}
