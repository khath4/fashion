<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Http\Requests\RequestContact;
use App\User;
use Carbon\Carbon;
use Mail;
use App\Http\Requests\ResetpassRequest;

class ForgotPasswordController extends FrontendController
{
    // use SendsPasswordResetEmails;
    public function getPassword()
    {
        return view('auth.passwords.email');
    }

    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;

        $check = User::where('email',$email)->first();

        if(! $check)
        {
            return redirect()->back()->with('error','Email không tồn tại');
        }

        $code = bcrypt(md5(time().$email));

        $check->code = $code;
        $check->time_code = Carbon::now();
        $check->save();

        $url = route('link.reset',['code' => $check->code,'Email' => $email]);

        $data = [
            'route' => $url
        ];

        Mail::send('email.reset_password', $data, function($message) use ($email){
            $message->to($email,"Lấy Lại Mật Khẩu")->subject('Lấy Lại Mật Khẩu!');
        });

        return redirect()->back()->with('success_log','Thành Công! Link lấy lại mật khẩu đã được gửi vào email của bạn.');
    }

    public function ResetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;

        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if(!$checkUser)
        {
            return redirect('/')->with('error_log','Đường dẫn không đúng, Vui lòng thử lại.');
        }

        return view('auth.passwords.reset');
    }  

    public function SaveResetPassword(ResetpassRequest $request)
    {
        if($request->password)
        {
            $code = $request->code;
            $email = $request->email;

            $checkUser = User::where([
                'code' => $code,
                'email' => $email
            ])->first();

            if(!$checkUser)
            {
                return redirect('/')->with('error_log','Đường dẫn không đúng, Vui lòng thử lại.');
            }
            $checkUser->password = bcrypt($request->password);
            $checkUser->save();

            return redirect()->route('get.login')->with('success_log','Mật khẩu mới đã được cập nhật.');
        }
    } 
}
