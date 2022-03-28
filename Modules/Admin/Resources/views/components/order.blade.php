
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Thông Tin Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                   
                 </tr>
              </thead>
            <tbody>
               @if(isset($orders))
                 @foreach($orders as $key => $order)
                   <tr>
                      	<td>{{ $order->product->id }}</td>
                      	<td>
                        	<a class="text text-secondary" href="{{ route('get.detail.product',[str_slug('$order->product->pro_name'),$order->or_product_id])}}">{{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}</a>
                        <ul class="showif">
                            @if($order->or_sale > 0)
                          	   <li><span><i class="fa fa-dollar-sign"></i> - {{ $order->or_sale }} % || <del> {{ number_format($order->or_price,0,',','.') }} </del> VND 
                               </span></li>
                            @endif
                          	<li><span><i class="fa fa-dollar-sign"></i> {{ format_price($order->or_price,$order->or_sale) }} </span></li>
                            <li><span><i class="fa fa-sort-numeric-up"></i>SL Hiện Có : {{ $order->product->pro_qty }}</span></li>
                        </ul>
                        <td><img src="{{ isset($order->product->pro_avatar) ? asset(pare_url_file($order->product->pro_avatar)) : '' }}" alt="" class="img_pro"></td>
                        <td>{{ $order->or_qty }}</td>
                        <td>{{ format_price2($order->or_price,$order->or_sale,$order->or_qty)  }}</td>
                      	</td>
                   </tr>
                 @endforeach
               @endif
              </tbody>
          </table>
        </div>
