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
								<li class="category3"><span>Thanh Toán</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<div class="main-container">
			<div class="product-cart">
				<div class="container">		
					<div class="row">
						<div class="checkout-content">	
							<div class="col-md-12 check-out-blok">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel checkout-accordion">
										<div class="panel-heading" role="tab" id="headingOne">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#checkoutMethod" aria-expanded="true" aria-controls="checkoutMethod">
													<span>Thanh Toán</span>
												</a>
											</h4>
										</div>
										<div id="checkoutMethod" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
											<div class="content-info">
												<div class="col-md-7">
													<div class="checkReg commonChack">
														<div class="checkTitle">
															<h2 class="ct-design">THANH TOÁN KHI NHẬN HÀNG</h2>
														</div>
														<div class="reginputlabel">
															@if(isset($products))
																@foreach($products as $product)
				                                            <ul class="cart-list">
				                                                <li>
				                                                    <a class="sm-cart-product" href="product-details.html">
				                                                        <img src="{{ asset(pare_url_file($product->options->image)) }}" alt="" class="img-pay">
				                                                    </a>
				                                                    <div class="small-cart-detail">
				                                                        <a class="small-cart-name2" href="product-details.html">{{ $product->name }}</a>
				                                                        <span class="quantitys2"><strong>{{ $product->qty }} </strong>x <span>{{ number_format($product->price,0,',','.') }} VND</span></span>
				                                                    </div>
				                                                </li>
				                                            </ul>
				                                            	@endforeach
				                                            @endif
			                                            <p>Tạm Tính: <span class="amount">{{ \Cart::subtotal(0) }} VND</span></p>
			                                    		</div>
			                                    	</div>
												</div>
												<div class="col-md-5">
													<div class="checkout-login">
														<div class="checkTitle">
															<h2 class="ct-design">Thông Tin Thanh Toán</h2>
														</div>
														<form action="" method="POST">
															@csrf
															<div class="loginFrom">
																<div class="form-group">
																	<p class="text-primary"><span>Họ Tên</span></p>
																	<input type="text" class="form-control" name="name" value="{{ get_data_user('web','name') }}" readonly="">
																</div>
																<div class="form-group">
																    <label class="text-primary">Số Tiền</label>
																    <input type="text" class="form-control" id="money" name="" value="{{ \Cart::subtotal(0).' VND' }}" readonly="">
															  	</div>
																<div class="form-group">
																	<p class="text-primary"><span> Số Điện Thoại</span></p>
																	<input type="number" class="form-control" name="phone" value="{{ get_data_user('web','phone') }}" required="">
																</div>
																<div class="form-group">
																	<p class="text-primary"><span> Email</span></p>
																	<input type="email" class="form-control" name="email" value="{{ get_data_user('web','email') }}" required="">
																</div>
																<div class="form-group">
																	<p class="text-primary"><span> Địa Chỉ</span></p>
																	<input type="text" class="form-control" name="address" value="{{ get_data_user('web','address') }}" required="">
																</div>
														        <div class="form-group">
															        <p class="text-primary"><span>Ghi Chú</span></p>
																	<textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
																</div>
															</div>
															<button type="submit" class="checkPageBtn">Thanh Toán</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
					<!-- div.info-section -->	
				</div>
				<!-- Checkout Container -->
				<div class="clearfix"></div>
			</div><!-- product-cart -->
		</div>
@stop