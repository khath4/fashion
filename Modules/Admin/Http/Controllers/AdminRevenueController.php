<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class AdminRevenueController extends Controller
{
    public function index()
    {
        $transactions = Transaction::select(DB::raw('count(id) as dh'),DB::raw('sum(tr_total) as total'),DB::raw('year(updated_at) as year'))->where('tr_status',Transaction::STATUS_DONE)->where('tr_pay_type','=',0)->groupBy(DB::raw('YEAR(updated_at)'))->get()->toArray();

        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::revenue.index',$viewData);
    }

    public function viewMonth(Request $request,$year)
    {
        if($request -> ajax())
        {
            $transactions = Transaction::select(DB::raw('count(id) as dh'),DB::raw('sum(tr_total) as total'),DB::raw('month(updated_at) as month'))
            ->where(DB::raw('year(updated_at)'),$year)
            ->where('tr_status',Transaction::STATUS_DONE)->where('tr_pay_type','=',0)->groupBy(DB::raw('MONTH(updated_at)'))->get()->toArray();

            $html = view('admin::components.month',compact('transactions'))->render();

            return \response()->json($html);
        }
    }

    public function indexOnline()
    {
        $transactions = Transaction::select(DB::raw('count(id) as dh'),DB::raw('sum(tr_total) as total'),DB::raw('year(updated_at) as year'))
        ->where('tr_pay_status','=',1)->where('tr_pay_type','=',1)->groupBy(DB::raw('YEAR(updated_at)'))->get()->toArray();

        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::revenue.view-online',$viewData);
    }

    public function viewMonthOnline(Request $request,$year)
    {
        if($request -> ajax())
        {
            $transactions = Transaction::select(DB::raw('count(id) as dh'),DB::raw('sum(tr_total) as total'),DB::raw('month(updated_at) as month'))
            ->where(DB::raw('year(updated_at)'),$year)
            ->where('tr_pay_status','=',1)->where('tr_pay_type','=',1)->groupBy(DB::raw('MONTH(updated_at)'))->get()->toArray();

            $html = view('admin::components.month',compact('transactions'))->render();

            return \response()->json($html);
        }
    }

}
