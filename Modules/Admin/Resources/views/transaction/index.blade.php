@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Đơn Hàng</li>
			    
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Đơn Hàng </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Tổng Tiền</th>
                    <th>Ghi Chú</th>
                    <th>Ngày</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($transactions))
                 @foreach($transactions as $transaction)
                   <tr>
                      <td>{{ $transaction->id }}</td>
                      <td>{{ isset($transaction->user->name) ? $transaction->user->name : '[N\A]'  }}</td>
                      <td>{{ $transaction->tr_phone }}</td>
                      <td>{{ $transaction->tr_address }}</td>
                      <td>{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
                      <td>{{ $transaction->tr_note }}</td>
                      <td>{{ $transaction->created_at->format('H:i d-m-Y')}}</td>
                      <td>
                        @if($transaction->tr_status == 1) 
                          <a href="#" class="badge badge-pill badge-success">Đã xữ lý</a>
                        @else
                          <a href="{{ route('admin.get.action.transaction',['status',$transaction->id]) }}" class="badge badge-pill badge-secondary">Chờ xữ lý</a>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt js_order_item" data-id="{{ $transaction->id }}" href="{{ route('admin.get.view.order', $transaction->id )}}"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-outline-danger btn-sm butt" href=""><i class="fa fa-times"></i> Xóa</a>
                      </td>
                   </tr>
                 @endforeach
               @endif
              </tbody>
          </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="MyOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Đơn Hàng #<b class="transaction_id"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="content_order">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Đóng</button>
      </div>
    </div>
  </div>
</div>
@stop        

@section('script')
    <!-- view detail transaction -->
  <script>
    $(function(){
      $(".js_order_item").click(function(event) {
          event.preventDefault();
          let $this = $(this);
          let url = $this.attr('href');
          $("#content_order").html('');
          $(".transaction_id").text('').text($this.attr('data-id'));
          $("#MyOrderModal").modal('show');
          
          $.ajax({
            url:url,
          }).done(function(result){
              if(result)
              {
                 $("#content_order").append(result);
              }
          });
      });
    })
  </script>
@stop