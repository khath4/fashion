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
							<h1>My Wishlist</h1>
						</div>
						<div class="table-responsive">
							<table class="cart-table">
								<thead>
									<tr>
										<th>#</th>
										<th>Thông Tin Sản Phẩm</th>
										<th></th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<a class="tb-img" href="#"><img alt="" class="img-responsive" src="img/products/wishlist/wish-2.jpg"></a>
										</td>
										<td>
											<h6><a href="#">Printed Chiffon Dress</a></h6>
											<p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et umattis lobortis.</p>
										</td>
										<td class="text-center">
											<div class="price-box">
												<span class="special-price">$300.00</span>
											</div>
											<a href="#" class="cart-button-wi">Add to Cart</a>
										</td>
										<td><a href="#" class="remove"><i class="fa fa-times"></i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="back-button">
						</div>
						<div class="back-button">
							<a href="{{route('user.dashboard')}}" class="btn btn-default"><i class="fa fa-angle-double-left"></i> Trở về</a>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<!-- wishlist-area-end -->
@stop