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
								<li class="category3"><span>Liện Hệ</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- contact-details start -->
		<div class="main-contact-area">
			<div class="container">
				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="contact-us-area">
							<!-- google-map-area start -->
							<div class="google-map-area">
								<!--  Map Section -->
								<div id="contacts" class="map-area">
									<div id="map" class="map" data-lat="9.913552" data-lng="105.144215"></div>
								</div>

							</div>
							<!-- google-map-area end -->
							<!-- contact us form start -->
							<div class="contact-us-form">
								<div class="sec-heading-area">
									<h2>Liên Hệ Chúng Tôi</h2>
								</div>
								<div class="contact-form">
									<span class="legend">Nhập Thông Tin Liên Hệ</span>
									<form action="" method="POST">
										@csrf
										<div class="form-top">
											<div class="form-group col-sm-6 col-md-6 col-lg-6">
												<label>Họ Tên <sup class="sup_active">*</sup></label>
												<input type="text" name="ct_name" class="form-control" value="{{ old('ct_name') }}">
												@if($errors->has('ct_name'))
						                        <div class="error-text">
						                           <i class="fa fa-exclamation"></i> {{$errors->first('ct_name')}}
						                        </div>
						                        @endif
											</div>
											<div class="form-group col-sm-6 col-md-6 col-lg-6">
												<label>Số Điện Thoại <sup class="sup_active">*</sup></label>
												<input type="text" name="ct_phone" class="form-control"value="{{ old('ct_phone') }}">
												@if($errors->has('ct_phone'))
						                        <div class="error-text">
						                           <i class="fa fa-exclamation"></i> {{$errors->first('ct_phone')}}
						                        </div>
						                        @endif
											</div>
											<div class="form-group col-sm-12">
												<label>Tiêu Đề <sup class="sup_active">*</sup></label>
												<input type="text" name="ct_title" class="form-control"value="{{ old('ct_title') }}">
												@if($errors->has('ct_title'))
						                        <div class="error-text">
						                           <i class="fa fa-exclamation"></i> {{$errors->first('ct_title')}}
						                        </div>
						                        @endif
											</div>
											<div class="form-group col-sm-12">
												<label>Email <sup class="sup_active">*</sup></label>
												<input type="email" name="ct_email" class="form-control"value="{{ old('ct_email') }}">
												@if($errors->has('ct_email'))
						                        <div class="error-text">
						                           <i class="fa fa-exclamation"></i> {{$errors->first('ct_email')}}
						                        </div>
						                        @endif
											</div>	
											<div class="form-group col-sm-12 col-md-12 col-lg-12">
												<label>Nội Dung <sup class="sup_active">*</sup></label>
												<textarea class="yourmessage" name="ct_content">{{ old('ct_content') }}</textarea>
												@if($errors->has('ct_content'))
						                        <div class="error-text">
						                           <i class="fa fa-exclamation"></i> {{$errors->first('ct_content')}}
						                        </div>
						                        @endif
											</div>												
										</div>
										<div class="submit-form form-group col-sm-12 submit-review">
											<p><sup>*</sup> Trường bắt buộc</p>
											<button type="submit" class="checkPageBtn">Gửi Thông Tin</button>
										</div>
									</form>
								</div>
							</div>
							<!-- contact us form end -->
						</div>					
					</div>
				</div>
			</div>	
		</div>
		<!-- contact-details end -->

@stop
