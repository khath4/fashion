<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\Orders;
use App\Models\Product;
use Carbon\Carbon;

class AdminTransactionController extends Controller
{
   
    public function index()
    {
    	$transactions = Transaction::with('user:id,name')->orderByDesc('id')->get();

    	$viewData = [
    		'transactions' => $transactions
    	];
        return view('admin::transaction.index',$viewData);
    }

    public function viewOrder(Request $request,$id)
    {
    	if($request -> ajax())
    	{
    		$orders = Orders::with('product')->where('or_transaction_id',$id)->get();

    		$html =  view('admin::components.order',compact('orders'))->render();
    		return \response()->json($html);
    	}
    }
    
    public function action(Request $request, $action,$id)
    {
        if($action)
        {   
            $code = 0;
            $count = 0;
            $transaction = Transaction::find($id);
            $orders = Orders::where('or_transaction_id',$id)->get();
            if($orders)
            {
                foreach($orders as $order)
                {
                    $product = Product::find($order->or_product_id);
                    if($product->pro_qty > 0)
                    {
                        $product->pro_qty = $product->pro_qty - $order->or_qty;
                        $product->pro_pay = $product->pro_pay + $order->or_qty;
                        $product->save();
                        $code++;
                    }
                    $count++;
                }
            }
            if($code == $count )
            {
                \DB::table('users')->where('id',$transaction->tr_user_id)->increment('user_total');

                $transaction->tr_status = Transaction::STATUS_DONE;
                
                $transaction->save();
                return redirect()->back()->with('success','Xữ lý đơn hàng thành công.');
            }
            else
            {
                return redirect()->back()->with('error','Số lượng sản phẩm không đủ để xử lý đơn hàng.');
            }
        }
    }
}
