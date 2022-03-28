<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Banner;

class LoginController extends FrontendController
{

    public function getLogin()
    {
        $login = Banner::select('banner_avatar','banner_link')->where('banner_status',Banner::STATUS_PUBLIC)->where('banner_type','=',2)->orderByDesc('updated_at')->limit(1)->get();
        $viewData = [
            'login' => $login
        ];
        return view('auth.login',$viewData);
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email','password');
        if(\Auth::attempt($credentials))
        {
            if(get_data_user('web','active') == 1)
            {
                return redirect()->route('home')->with('success_log','Đăng nhập thành công.');    
            }
            else
            {
                \Auth::logout();
                return redirect()->back()->with('error_log','Tài khoản đã bị khóa.');
            }
        }
        return redirect()->back()->with('error_log','Tài khoản hoặc mật khẩu không đúng.');
    }
    public function getLogout()
    {
        \Auth::logout();
        return redirect()->route('home')->with('success_log','Đăng xuất thành công.');
    }
}
