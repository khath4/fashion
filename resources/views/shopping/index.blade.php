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
									<a href="{{ route('home')}}">Trang Chủ</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Giỏ Hàng</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- Shopping Table Container -->
		<div class="cart-area-start">
			<div class="container">
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th>STT</th>
										<th>Hình Ảnh</th>
										<th>Tên Sản Phẩm</th>
										<th>Giảm Giá</th>		
										<th>Giá</th>
										<th>Số Lượng</th>
										<th>Thành Tiền</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1 ?>
									@foreach($products as $key => $product)	
									<tr>
										<td>#{{ $i}}</td>
										<td>
											<a href="{{ route('get.detail.product',[$product->options->slug,$product->id]) }}"><img src="{{ asset(pare_url_file($product->options->image)) }}" class="img-responsive" alt=""/></a>
										</td>
										<td>
											<h6>{{$product->name}}</h6>
										</td>
										<td>
											<div class="cart-price">- {{ $product->options->sale }}<i>%</i></div>
											@if($product->options->sale > 0)
											<div class="cart-price"><del>{{ number_format($product->options->old_price,0,',','.')}}</del><i>VND</i></div>
											@endif
										</td>
										<td>
											<div class="cart-price">{{ number_format($product->price,0,',','.') }}<i>VND</i>	
										</div>
										</td>
										<td>
											<form>
												<input type="number" value="{{ $product->qty }}" readonly="" min="1">
											</form>
										</td>
										<td>
											<div class="cart-subtotal">{{ number_format($product->qty * $product->price,0,',','.') }}<i>VND</i></div>
										</td>
										<td>
											<a href="{{ route('get.shopping.plus',$key) }}" class="float-left"><i class="fa fa-plus"></i></a>
											<a href="{{ route('get.shopping.minus',$key) }}" class="float-right"><i class="fa fa-minus"></i></a>
											<a href="{{ route('get.shopping.delete',$key) }}"><i class="fa fa-times"></i></a>
											
										</td>
									</tr>
									<?php $i++ ?>
									@endforeach
									
									<tr>
										<td class="actions-crt" colspan="8">
											<div class="">
												<div class="col-md-4 col-sm-4 col-xs-4 align-left"></div>
												<div class="col-md-4 col-sm-4 col-xs-4 align-right"></div>
												<div class="col-md-4 col-sm-4 col-xs-4 align-center"><a class="cbtn" data-toggle="modal" data-target="#exampleModal">Xóa Tất Cả</a></div>
											</div>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				<div class="row">
					<div class="col-md-12 vendee-clue">
						<!-- Shopping Code -->
						<div class="shipping coupon hidden-sm">
							<div class=""><h5>Mã Giãm Giá</h5></div>
							<p>Nhập mã giảm giá ở đây</p>
							<form>
								<input type="text" class="coupon-input">
								<button class="pull-left" type="submit">Áp Dụng</button>
							</form>
						</div>
						<!-- Shopping Code -->
						<!-- Shopping Totals -->
						<div class="shipping coupon cart-totals">
							<ul>
								<li class="cartSubT">Phí Vận Chuyển:    <span>Miễn Phí</span></li>
								<li class="cartSubT">Tạm Tính:    <span>{{ Cart::subtotal(0) }} VND</span></li>
							</ul>
							<a class="proceedbtn" href="{{ route('get.form.pay') }}">Thanh Toán</a>	
							<a class="proceedbtn-online" href="{{ route('get.form.pay.online') }}">Thanh Toán Online</a>	
						</div>
						<!-- Shopping Totals -->
					</div>
				</div>
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->

		<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Xác Nhận !</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Bạn có muốn xóa tất cả sản phẩm khỏi giỏ hàng?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Đóng</button>
	        <a href="{{route('get.shopping.destroy')}}" class="btn btn-danger btn-sm">Xóa</a>
	      </div>
	    </div>
	  </div>
	</div>
@stop