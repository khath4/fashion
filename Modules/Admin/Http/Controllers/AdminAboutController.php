<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;

class AdminAboutController extends Controller
{
    public function index()
    {
        $abouts = About::get();

        $viewdata = [
            'abouts' => $abouts
        ];
        return view('admin::about.index', $viewdata);
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('admin::about.update',compact('about'));
    }
    public function update(AboutRequest $requestAbout ,$id)
    {
        $this->insert_update($requestAbout,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }

    public function insert_update($requestAbout ,$id='')
    {   
        $about = new About();

        if($id)
        {
            $about = About::find($id);
        }

        $about->a_email = $requestAbout->a_email;
        $about->a_phone = $requestAbout->a_phone;
        $about->a_address = $requestAbout->a_address;
        $about->time_open = $requestAbout->time_open;
        $about->a_description = $requestAbout->a_description;
        $about->save();   
    }

}
