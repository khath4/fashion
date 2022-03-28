<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Page_StaticsRequest;
use App\Models\PageStatic;

class AdminPageStaticsController extends Controller
{
    
    public function index()
    {
        $page_statics = PageStatic::get();

        $viewdata = [
            'page_statics' => $page_statics
        ];
        return view('admin::page-statics.index',$viewdata);
    }

    public function create()
    {
        return view('admin::page-statics.create');
    }

    public function store(Page_StaticsRequest $page_staticRequest)
    {
        $this->insert_update($page_staticRequest);
        return redirect()->back()->with('success','Thêm mới thành công.');
    }

    public function edit($id)
    {
        $page_static =  PageStatic::find($id);
        return view('admin::page-statics.update',compact('page_static'));
    }

    public function update(Page_StaticsRequest $page_staticRequest,$id)
    {
        $this->insert_update($page_staticRequest,$id);
        return redirect()->back()->with('success','Cập nhật thành công.');
    }

    public function insert_update($page_staticRequest,$id='')
    {
        $page_static = new PageStatic();

        if($id)
        {
            $page_static = PageStatic::find($id);
        }

        $page_static->ps_name = $page_staticRequest->ps_name;
        $page_static->ps_type = $page_staticRequest->ps_type;
        $page_static->ps_content = $page_staticRequest->ps_content;
        
        $page_static->save(); 
    }
    public function action($action,$id)
    {
        $messages = '';
        if($action)
        {
            $page_static = PageStatic::find($id);
            switch ($action) {
                case 'delete':
                    $page_static->delete();
                    $messages = 'Xóa thành công.';
                    break;
            }
        }
        return redirect()->back()->with('success',$messages);
    }
}
