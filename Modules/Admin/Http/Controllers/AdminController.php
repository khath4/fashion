<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Ratings;
use App\Models\Contact;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function index()
    {
        $ratings = Ratings::with('user:id,name','product:id,pro_name,pro_slug')->limit(10)->get();

        $contacts = Contact::select('id','ct_name','ct_title','ct_content','ct_status')->limit(10)->get();

        $moneyDay = Transaction::whereDay('updated_at',date('d'))->where('tr_pay_type','=',0)->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');

        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))->where('tr_pay_type','=',0)->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');
        
        $moneyYear = Transaction::whereYear('updated_at',date('Y'))->where('tr_pay_type','=',0)->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');

        $moneyDay_online = Transaction::whereDay('updated_at',date('d'))->where('tr_pay_type','=',1)->where('tr_pay_status','=',1)->sum('tr_total');

        $moneyMonth_online = Transaction::whereMonth('updated_at',date('m'))->where('tr_pay_type','=',1)->where('tr_pay_status','=',1)->sum('tr_total');
        
        $moneyYear_online = Transaction::whereYear('updated_at',date('Y'))->where('tr_pay_type','=',1)->where('tr_pay_status','=',1)->sum('tr_total');        

        $total = Transaction::where('tr_pay_type','=',0)->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');

        $total_online = Transaction::where('tr_pay_type','=',1)->where('tr_pay_status','=',1)->sum('tr_total');

        $transactionNews = Transaction::with('user:id,name')->limit(10)->orderByDesc('id')->get();

        $viewData = [
        	'ratings' => $ratings,
        	'contacts' => $contacts,
            'moneyDay'=> $moneyDay,
            'moneyMonth'=> $moneyMonth,
            'moneyYear'=>$moneyYear,
            'transactionNews' => $transactionNews,
            'moneyDay_online' => $moneyDay_online,
            'moneyMonth_online' => $moneyMonth_online,
            'moneyYear_online' => $moneyYear_online,
            'total' => $total,
            'total_online' => $total_online
        ]; 
        return view('admin::index',$viewData);
    }
}
