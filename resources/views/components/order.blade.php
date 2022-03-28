
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Sản Phẩm</th>
                    <th>Thông Tin</th>
                    <th>Thành Tiền</th> 
                 </tr>
              </thead>
            <tbody>
               @if(isset($orders))
                 @foreach($orders as $key => $order)
                   <tr>
                      	<td>{{ $order->product->id }}</td>
                        <td><img src="{{ isset($order->product->pro_avatar) ? asset(pare_url_file($order->product->pro_avatar)) : '' }}" alt="" class="img_pro"></td>
                      	<td>
                        	<a class="text text-secondary" href="{{ route('get.detail.product',[str_slug('$order->product->pro_name'),$order->or_product_id])}}">- {{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}</a>
                        <ul class="showif">
                          	@if($order->or_sale > 0)
                               <li><span>✔ - {{ $order->or_sale }} % || <del> {{ number_format($order->or_price,0,',','.') }} </del> VND 
                               </span></li>
                            @endif
                            <li><span>✔ {{ $order->or_qty }} x {{ format_price($order->or_price,$order->or_sale) }} </span></li>
                        </ul>
                        <td>{{ format_price2($order->or_price,$order->or_sale,$order->or_qty)  }}</td>
                      	</td>
                   </tr>
                 @endforeach
               @endif
              </tbody>
          </table>
        </div>
