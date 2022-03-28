<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
//use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Cart;
use App\Models\Transaction;
use App\Models\About;
use App\Models\Orders;
use Carbon\Carbon;
use Mail;

class ShoppingCartController extends FrontendController
{
    private $vnp_TmnCode = "6T3FJN1A"; //Mã website tại VNPAY 
    private $vnp_HashSecret = "CGNYCBOGENHXTEKNFLDJYQFAPPWFSTTH"; //Chuỗi bí mật
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

    public function addProduct(Request $request,$id)
    {
    	$product = Product::select('id','pro_name','pro_slug','pro_price','pro_qty','pro_sale','pro_avatar')->find($id);

    	if(!$product)
    	{
    		return redirect('/');
    	}
        if($product->pro_qty == 0)
        {
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng.');
        }

        $check = \Cart::content();
        foreach($check as $pro)
        {
            if($pro->id == $product->id)
            {
                if($product->pro_qty == $pro->qty )
                return redirect()->back()->with('warning','Sản phẩm trong kho không đủ, Vui lòng thử với số lượng thấp hơn.');
            }
        }

    	\Cart::add([
    		'id' => $product->id, 
    		'name' => $product->pro_name, 
    		'qty' => 1, 
    		'price' => number_price($product->pro_price,$product->pro_sale), 
    		'weight' => 1,
    		'options' => [
    			'sale' => $product->pro_sale,
    			'old_price' => $product->pro_price,
    			'image' => $product->pro_avatar,
                'slug' => $product->pro_slug
    		]
    	]);
    	return redirect()->back()->with('success','Thêm vào giỏ hàng thành công.');
    }

    public function getListShoppingCart()
    {
    	$products = \Cart::content();
    	return view('shopping.index',compact('products'));
    }

    public function delete($key)
    {
    	\Cart::remove($key);
    	return redirect()->back()->with('success','Xóa thành công.');
    }

    public function plus($key)
    {
        $products = \Cart::content();
        foreach($products as $id => $product)
        {
            if($key == $id)
            {
                $check = Product::find($product->id);
                if($check->pro_qty > $product->qty)
                {
                    \Cart::update($key, ['qty' => $product->qty+1]); 
                }
                else
                {
                    return redirect()->back()->with('warning','Sản phẩm trong kho không đủ, Vui lòng thử với số lượng thấp hơn.');
                }
            }
        }
        
        return redirect()->back()->with('success','Cập nhật giỏ hàng thành công.');
    }

    public function minus($key)
    {
        $products = \Cart::content();
        foreach($products as $id => $product)
        {
            if($key == $id)
            {
                if($product->qty > 1)
                {
                    \Cart::update($key, ['qty' => $product->qty-1]); 
                }
                else
                {
                    return redirect()->back()->with('warning','Sản phẩm không thể nhỏ hơn 1.');
                }
            }
        }
        return redirect()->back()->with('success','Cập nhật giỏ hàng thành công.');
    }

    public function destroy()
    {
        if(\Cart::count() == 0) 
        {
            return redirect()->back()->with('warning','Giỏ hàng trống.');
        }
        \Cart::destroy();
        return redirect()->back()->with('success','Xóa thành công.');
        
    }

    public function getFormPay()
    {
        $products = \Cart::content();
        return view('shopping.pay',compact('products'));
    }

    public function saveInforShopping(Request $request)
    {
        if(get_data_user('web','status') != 0)
        {
            $totalMoney = str_replace(',', '',\Cart::subtotal(0));
            $transactionId =  Transaction::insertGetId([
                'tr_user_id' => get_data_user('web'),
                'tr_total' => (int)$totalMoney,
                'tr_note' => $request->note,
                'tr_address' => $request->address,
                'tr_phone' => $request->phone,
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now(),

            ]);

            if($transactionId)
            {
                $products = \Cart::content();
                foreach($products as $product)
                {
                    Orders::insert([
                        'or_transaction_id' => $transactionId,
                        'or_product_id' => $product->id,
                        'or_qty'=> $product->qty,
                        'or_price' => $product->options->old_price,
                        'or_sale' => $product->options->sale,
                        'created_at' => Carbon::now(),
                        'updated_at'=> Carbon::now(),
                    ]);
                }

                $email = get_data_user('web','email');

                $transactions = Transaction::where('tr_user_id',get_data_user('web'))->where('id',$transactionId)->get();

                $orders = Orders::with('product')->where('or_transaction_id',$transactionId)->get();

                $about = About::limit(1)->get();

                $data = [
                    'transactions' => $transactions,
                    'orders' => $orders,
                    'about' => $about
                ];

                Mail::send('email.verify_transaction', $data, function($message) use ($email){
                    $message->to($email,"Xác nhận đơn hàng")->subject('Xác thực đơn hàng!');
                });

            }

            \Cart::destroy();
            return redirect()->route('user.dashboard')->with('success_log','Đơn hàng đã được ghi nhận, Chúng tôi sẽ liên hệ với bạn sớm nhất.');
        }
        return redirect()->back()->with('error_log','Tài khoản chưa kích hoạt không thể thanh toán.');
    }

    public function getFormPayOnline()
    {
        $products = \Cart::content();

        if(isset($_GET['code']) && $_GET['vnp_TxnRef'] && base64_decode($_GET['code']) == $_GET['vnp_TxnRef'] && $_GET['vnp_SecureHash'])
        {
            $vnp_SecureHash = $_GET['vnp_SecureHash'];
            $inputData = array();
            foreach ($_GET as $key => $value) {
                if (substr($key, 0, 4) == "vnp_") {
                    $inputData[$key] = $value;
                }
            }
            unset($inputData['vnp_SecureHashType']);
            unset($inputData['vnp_SecureHash']);
            ksort($inputData);
            $i = 0;
            $hashData = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashData = $hashData . '&' . $key . "=" . $value;
                } else {
                    $hashData = $hashData . $key . "=" . $value;
                    $i = 1;
                }
            }

            //$secureHash = md5($vnp_HashSecret . $hashData);
            $secureHash = hash('sha256',$this->vnp_HashSecret . $hashData);
            if ($secureHash == $vnp_SecureHash) {
                if ($_GET['vnp_ResponseCode'] == '00') 
                {
                    $transactions = Transaction::find(base64_decode($_GET['code']));

                    $transactions->tr_pay_status = 1;
                    $transactions->save();

                    return redirect()->route('user.dashboard')->with('success_log','Đơn hàng đã thanh toán thành công.');
                }   
            }
        }
        
        return view('shopping.pay-online',compact('products'));
    }

    public function saveInforShoppingOnline(Request $request)
    {
        if(get_data_user('web','status') != 0)
        {
            $totalMoney = str_replace(',', '',\Cart::subtotal(0));
            $transactionId =  Transaction::insertGetId([
                'tr_user_id' => get_data_user('web'),
                'tr_total' => (int)$totalMoney,
                'tr_note' => $request->note,
                'tr_address' => $request->address,
                'tr_phone' => $request->phone,
                'tr_pay_type' => 1,
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now(),

            ]);

            if($transactionId)
            {
                $products = \Cart::content();
                foreach($products as $product)
                {
                    Orders::insert([
                        'or_transaction_id' => $transactionId,
                        'or_product_id' => $product->id,
                        'or_qty'=> $product->qty,
                        'or_price' => $product->options->old_price,
                        'or_sale' => $product->options->sale,
                        'created_at' => Carbon::now(),
                        'updated_at'=> Carbon::now(),
                    ]);
                }

                $email = get_data_user('web','email');

                $transactions = Transaction::where('tr_user_id',get_data_user('web'))->where('id',$transactionId)->get();

                $orders = Orders::with('product')->where('or_transaction_id',$transactionId)->get();

                $about = About::limit(1)->get();

                $data = [
                    'transactions' => $transactions,
                    'orders' => $orders,
                    'about' => $about
                ];

                Mail::send('email.verify_transaction', $data, function($message) use ($email){
                    $message->to($email,"Xác nhận đơn hàng")->subject('Xác thực đơn hàng!');
                });

            }
            $hash_code = base64_encode($transactionId);
            $vnp_Returnurl = "http://laravel7x.abc/gio-hang/thanh-toan-online?code=$hash_code";

            $vnp_OrderInfo = $request->note;

                if(empty($request->note)) 
                {
                    $vnp_OrderInfo = " ";
                }

                $inputData = array(
                    "vnp_Version" => "2.0.0",
                    "vnp_TmnCode" => $this->vnp_TmnCode,
                    "vnp_Amount" => $totalMoney * 100,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'],
                    "vnp_Locale" => $request->language,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => "fashion",
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $transactionId,
                );
                
                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                // $inputData['vnp_BankCode'] = "NCB";
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . $key . "=" . $value;
                    } else {
                        $hashdata .= $key . "=" . $value;
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }
                
                $vnp_Url = $this->vnp_Url . "?" . $query;
                if (isset($this->   vnp_HashSecret)) {
                   // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                    $vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
                    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array('code' => '00'
                    , 'message' => 'success'
                    , 'data' => $vnp_Url);
                // echo json_encode($returnData);
                \Cart::destroy();
                return redirect()->to($returnData['data']);
        }
        return redirect()->back()->with('error_log','Tài khoản chưa kích hoạt không thể thanh toán.');
    }

    public function RePay(Request $request)
    {
        if(get_data_user('web','status') != 0)
        {
            $url = $request->segment(2);
            
            $url = preg_split('/(-)/i', $url);
           
            if($code = array_pop($url))
            {
                $id = base64_decode($code);

                $transactions =  Transaction::find($id);

                if($transactions)
                {
                    if(get_data_user('web') == $transactions->tr_user_id)
                    {
                        $hash_code = base64_encode($transactions->id);
                        $vnp_Returnurl = "http://laravel7x.abc/gio-hang/thanh-toan-online?code=$hash_code";
                       
                        if(empty($transactions->note)) 
                        {
                            $vnp_OrderInfo = " ";
                        }

                        $inputData = array(
                            "vnp_Version" => "2.0.0",
                            "vnp_TmnCode" => $this->vnp_TmnCode,
                            "vnp_Amount" => $transactions->tr_total * 100,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'],
                            "vnp_Locale" => "vn",
                            "vnp_OrderInfo" => $vnp_OrderInfo,
                            "vnp_OrderType" => "fashion",
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $transactions->id,
                        );
                        
                        if (isset($vnp_BankCode) && $vnp_BankCode != "") 
                        {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . $key . "=" . $value;
                            } else {
                                $hashdata .= $key . "=" . $value;
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }
                        
                        $vnp_Url = $this->vnp_Url . "?" . $query;
                        if (isset($this->   vnp_HashSecret)) 
                        {   
                            $vnpSecureHash = hash('sha256', $this->vnp_HashSecret . $hashdata);
                            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array('code' => '00'
                            , 'message' => 'success'
                            , 'data' => $vnp_Url);
                        
                        return redirect()->to($returnData['data']);
                    }
                    else
                    {
                        return redirect()->route('user.dashboard')->with('error_log','Dữ liệu không tồn tái.');
                    }
                }
                else
                {
                    return redirect()->route('user.dashboard')->with('error_log','Dữ liệu không tồn tại.');
                }
            }
        }
        else
        {
            return redirect()->back()->with('error_log','Tài khoản chưa kích hoạt không thể thanh toán.');
        }
    }

}
