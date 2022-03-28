<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Orders;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades;
use App\Http\Requests\ChangepassRequest;
use Carbon\Carbon;
use Mail;

class UserController extends FrontendController
{
    public function index()
    {
    	$transactions = Transaction::where('tr_user_id',get_data_user('web'))->orderByDesc('id')->paginate(10);

    	$viewData = [
    		'transactions' => $transactions
    	];

    	return  view('user.index',$viewData);
    }

    public function info()
    {
    	$user = User::find(get_data_user('web'));

    	return view('user.info',compact('user'));
    }

    public function SaveInfo(UserRequest $request) 
    {
  		$user = User::where('id',get_data_user('web'))->update($request->except('_token','login','avatar'));

    	if($request->hasFile('avatar'))
        {
        	$user = User::find(get_data_user('web'));

            $file = upload_image('avatar');
            if(isset($file['name']))
            { 
                $user->avatar = $file['name'];
            }
            $user->save();
        }

    	return redirect()->back()->with('success','Cập nhật thành công.');	
    }

    public function password()
    {
        return view('user.password');
    }

    public function SavePassword(ChangepassRequest $userRequest)
    {
        if($hashed = \Hash::check($userRequest->password_old,get_data_user('web','password')))
        {
           $user = User::find(get_data_user('web','id'));
           $user->password = bcrypt($userRequest->password);

           $user->save();

            return redirect()->back()->with('success','Đổi mật khẩu thành công.');
        }
        return redirect()->back()->with('error','Mật khẩu cũ không đúng.');
    }

    public function WishList()
    {
        return view('user.wishlist');
    }

    public function viewOrder(Request $request,$id)
    {
        if($request -> ajax())
        {
            $orders = Orders::with('product')->where('or_transaction_id',$id)->get();

            $html =  view('components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }

    public function reVerify()
    {
        if(get_data_user('web'))
        {
            $user = User::find(get_data_user('web'));

            $now =Carbon::now();
            $year = date('Y' , strtotime($user->time_status));
            $month = date('m' , strtotime($user->time_status));
            $day = date('d' , strtotime($user->time_status));
            $hour = date('H' , strtotime($user->time_status));
            $minute = date('i' , strtotime($user->time_status));

            if($now->year == $year && $now->month == $month && $now->day == $day && $now->hour == $hour && $now->minute == $minute || $now->minute == $minute+1)
            {
                return redirect()->back()->with('warning','Đã gửi mã kích hoạt ,Vui lòng thử lại sau ít phút.');
            }
            else
            {
                $email = $user->email;

                $code = bcrypt(md5(time().$email));

                $user->code_status = $code;
                $user->time_status = Carbon::now();
                $user->save();

                $url = route('get.verify.account',['id' => get_data_user('web'),'code' => $code]);

                $data = [
                    'route' => $url
                ];

                Mail::send('email.verify_account', $data, function($message) use ($email){
                    $message->to($email,"Gửi lại mã kích hoạt tài khoản")->subject('Gửi lại mã kích Hoạt Tài Khoản!');
                });

                return redirect()->back()->with('success_log','Gửi lại mã kích hoạt thành công ,Bạn hãy kiểm tra lại email.');
            }
        }
    }
}
