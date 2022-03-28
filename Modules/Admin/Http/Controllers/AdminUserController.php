<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;

class AdminUserController extends Controller
{
  
    public function index(Request $request)
    {
    	$users = User::whereRaw(1);	

    	$users = $users->orderBy('id','DESC')->get();

    	$viewData = [
    		'users' => $users
    	];

        return view('admin::user.index',$viewData);
    }

    public function action($action,$id)
    {
        $messages = '';
        if($action)
        {
            $user = User::find($id);
            switch ($action) {
                case 'active':
                    $user->active = $user->active ? 0 : 1;
                    $messages = 'Kích hoạt thành công.';
                    $user->save();
                    break;      
            }
        }
        return redirect()->back()->with('success',$messages);
    }

}
