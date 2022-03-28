<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontendController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;
use Mail;
use App\Models\Banner;

class RegisterController extends FrontendController
{
    use RegistersUsers;

    public function getRegister()
    {
        $register = Banner::select('banner_avatar','banner_link')->where('banner_status',Banner::STATUS_PUBLIC)->where('banner_type','=',3)->orderByDesc('updated_at')->limit(1)->get();
        $viewData = [
            'register' => $register
        ];
        return view('auth.register',$viewData);
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        if($user->id)
        {
            $email = $user->email;

            $code = bcrypt(md5(time().$email));

            $user->code_status = $code;
            $user->time_status = Carbon::now();
            $user->save();

            $url = route('get.verify.account',['id' => $user->id,'code' => $code]);

            $data = [
                'route' => $url
            ];

            Mail::send('email.verify_account', $data, function($message) use ($email){
                $message->to($email,"Kích hoạt tài khoản")->subject('Kích Hoạt Tài Khoản!');
            });

            return redirect()->route('get.login')->with('success_log','Đăng ký tài khoản thành công.');
        }
        return redirect()->back()->with('error_log','Hệ thống lỗi xin vui lòng thử lại sau.');
    }

    public function VerifyAccount(Request $request)
    {
        $code_status = $request->code;
        $id = $request->id;

        $checkUser = User::where([
            'code_status' => $code_status,
            'id' => $id
        ])->first();

        if(!$checkUser)
        {
            return redirect('/')->with('error_log','Đường dẫn không đúng, Vui lòng thử lại.');
        }

        $checkUser->status = 1;
        $checkUser->Save();
        return redirect()->route('home')->with('success_log','Kích hoạt tài khoản thành công.');
    }
}
