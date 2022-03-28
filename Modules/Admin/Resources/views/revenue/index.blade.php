@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Sản Phẩm</li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Doanh Thu</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Trong Năm</th>
                    <th>Tổng Doanh Thu</th>
                    <th>Số Đơn Hàng Đã Bán Trong Năm</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
            @if(isset($transactions))
                @foreach($transactions as $key => $transaction)
                   <tr>
                      <td>{{$key+1}}</td>
                      <td><i>{{ $transaction['year']}}</i></td>
                      <td><i>{{ number_format($transaction['total'],0,',','.') }}</i> VND</td>
                      <td><i>{{ $transaction['dh']}} Đơn</i></td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt js_order_item" data-id="{{ $transaction['year'] }}" href="{{ route('admin.get.view.month', $transaction['year'] )}}"><i class="fa fa-pen-square"></i> Chi Tiết</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Doanh Thu Năm #<b class="year"></b></h5>
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
          $(".year").text('').text($this.attr('data-id'));
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