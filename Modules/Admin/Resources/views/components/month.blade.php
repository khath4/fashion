
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>      
                    <th>Tháng</th>
                    <th>Tổng Doanh Thu Trong Tháng</th> 
                    <th>Số Đơn Hàng Đã Bán Trong Tháng</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($transactions))
                 @foreach($transactions as $transaction)
                   <tr>
                      	<td><i>{{ $transaction['month'] }}</i></td>
                        <td><i>{{ number_format($transaction['total'],0,',','.')}}</i> VND</td>
                        <td><i>{{ $transaction['dh']}} Đơn</i></td>
                   </tr>
                 @endforeach
               @endif
              </tbody>
          </table>
        </div>
