<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
 
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');

        if(Auth::guard('admins')->attempt($data)) 
        {
            return redirect()->route('admin.home')->with('success_login','Đăng nhập thành công.');
        }
        return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng.');
    }
    public function logoutAdmin() 
    {
        Auth::guard('admins')->logout();

        return redirect()->route('admin.login')->with('success','Đăng xuất thành công.');
    }
}
