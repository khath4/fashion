@extends('layouts.app')
@section('content')
			<!-- breadcrumbs area start -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="container-inner">
							<ul>
								<li class="home">
									<a href="{{route('home')}}">Trang Chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Tài Khoản</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- wishlist-area-start -->
		<div class="wishlist-concept">
			<div class="container">
				<div class="row">
					@include('components.menu_user')	
					<div class="col-sm-12 col-lg-9 col-md-9">
						<div class="form-title">
						<h1>Thông Tin Cá Nhân</h1>
						</div>
						<div class="page-content page-container" id="page-content">
						    <div class="padding">
						        <div class="d-flex justify-content-center">
						            <div class="user-profile-custom">
						                <div class="card user-card-full">
						                    <div class="row m-l-0 m-r-0">
						                        <div class="col-sm-4 bg-c-lite-green user-profile">
						                            <div class="card-block text-center text-white">
						                            	@if(get_data_user('web','avatar') == NULL)
						                                	<div class="m-b-25"> <img src="{{ asset('theme_fontend/img/unnamed.png') }}" class="img-radius" alt="User-Profile-Image"></div>
						                                @else
						                                	<div class="m-b-25"> <img src="{{ asset(pare_url_file(get_data_user('web','avatar'))) }}" class="img-radius" alt="User-Profile-Image"></div>
						                                @endif
						                                <h5 class="f-w-600">Thành Viên</h5>
						                                <!-- <p>Web Designer</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i> -->
						                            </div>
						                        </div>
						                        <div class="col-sm-8">
						                            <div class="card-block">
						                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Thông Tin</h6>
						                                <div class="row">
						                                    <div class="col-sm-6">
						                                        <p class="m-b-10 f-w-600">Họ Tên</p>
						                                        <h6 class="text-muted f-w-400">{{ get_data_user('web','name')}}</h6>
						                                    </div>
						                                    <div class="col-sm-6">
						                                        <p class="m-b-10 f-w-600">Số Điện Thoại</p>
						                                        <h6 class="text-muted f-w-400">{{ get_data_user('web','phone')}}</h6>
						                                    </div>
						                                </div>
						                                <!-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6> -->
						                                <div class="row">
						                                    <div class="col-sm-12">
						                                        <p class="m-b-10 f-w-600">Email</p>
						                                        <h6 class="text-muted f-w-400">{{ get_data_user('web','email')}}</h6>
						                                    </div>
						                                </div>
						                               	<div class="row">
						                                    <div class="col-sm-12">
						                                        <p class="m-b-10 f-w-600">Cập Nhật Lúc</p>
						                                        <h6 class="text-muted f-w-400">{{ get_data_user('web','updated_at')}}</h6>
						                                    </div>
						                                </div>
						                            	<div class="row">
						                                    <div class="col-sm-12">
						                                        <p class="m-b-10 f-w-600">Trạng Thái</p>
						                                        @if(get_data_user('web','status') == 0)
						                                        	<h6 class="text-unverify">Tài Khoản Chưa Kích Hoạt <i class="fa fa-warning"></i></h6>
						                                        	<a href="{{route('user.reverify')}}" class="badge badge-primary send_code">Gửi lại mã kích hoạt</a>
						                                        	<!-- <div>Registration closes in <span id="time">01:00</span> minutes!</div> -->
						                                        @else
						                                        	<h6 class="text-verify">Tài Khoản Đã Kích Hoạt <i class="fa fa-check"></i></h6>
						                                        @endif
						                                    </div>
						                                </div>
						                            </div>
						                        </div>
						                    </div>
						                </div>
						            </div>
						        </div>
						    </div>
						</div>
						
						<div class="form-title">
							<h1>Đơn Hàng</h1>
						</div>
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th>#</th>
										<th>Địa Chỉ</th>
										<th>Điện Thoại</th>
										<th>Tổng Tiền</th>
										<th>Trạng Thái</th>
										<th>Thanh Toán</th>
										<th>Đặt Lúc</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
								@if(isset($transactions))
									@foreach($transactions as $transaction)
									<tr>
										<td><h6><a href="#">{{ $transaction->id}}</a></h6></td>
										<td>{{ $transaction->tr_address}}</td>
										<td>{{ $transaction->tr_phone }}</td>
										<td class="text-center">
											<div class="price-box">
												<span class="special-price">{{ number_format($transaction->tr_total,0,',','.')}} VND</span>
											</div>
										</td>
										<td>
											@if($transaction->tr_status == 1) 
					                          <c class="badge badge-pill badge-success">Đã xữ lý</c>
					                        @else
					                           <c class="badge badge-pill badge-warning">Chờ xữ lý</c>
					                        @endif

										</td>
										<td>
											@if($transaction->tr_pay_type == 1) 
					                          	<c class="badge badge-pill badge-success">Online</c>
					                          	@if($transaction->tr_pay_status == 1) 
						                          	<c class="badge badge-pill badge-success">Đã Thanh Toán</c>
						                        @else
						                           	<a href="{{route('re.get.form.pay.online',base64_encode($transaction->id))}}" class="badge badge-pill badge-danger">Tiếp Tục Thanh Toán</a>
						                        @endif
					                        @else
					                           	<c class="badge badge-pill badge-default">Thường</c>
					                        @endif

					                        
					                    </td>
										<td>
											{{ $transaction->created_at->format('H:i d/m/Y') }}
										</td>
										<td>
											<a class="btn btn-outline-primary js_order_item" data-id="{{ $transaction->id }}" href="{{ route('get.view.orders', $transaction->id )}}"><i class="fa fa-eye"></i></a>
										</td>
									</tr>
									@endforeach
								@endif
								</tbody>
							</table>
						</div>
						
						<div class="back-button">
							{{ $transactions->appends(request()->query())->links('vendor.pagination.custom') }}
						</div>
					
					</div>
				</div>
			</div>
		</div>
		<!-- wishlist-area-end -->
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
<!-- <script>
	function startTimer(duration, display) {
	    var timer = duration, minutes, seconds;
	    setInterval(function () {
	        minutes = parseInt(timer / 60, 10);
	        seconds = parseInt(timer % 60, 10);

	        minutes = minutes < 10 ? "0" + minutes : minutes;
	        seconds = seconds < 10 ? "0" + seconds : seconds;

	        display.textContent = minutes + ":" + seconds;

	        if (--timer < 0) {
	            timer = duration;
	        }
	    }, 1000);
	}
	window.onload = function () {
	    var fiveMinutes = 60 * 1,
	        display = document.querySelector('#time');
	    startTimer(fiveMinutes, display);
	};	
</script> -->
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