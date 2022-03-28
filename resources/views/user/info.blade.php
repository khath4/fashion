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
								<li class="home">
									<a href="{{route('user.dashboard')}}">Tài Khoản</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>Cập Nhật</span></li>
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
								<!-- account-details Area Start -->
        				<div class="customer-login-area">            
                        <div class="customer-login my-account">
                            <form method="post" class="login" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-fields">
                                    <h2>Cập Nhật</h2>
                                    <p class="form-row form-row-wide">
                                        <label for="username">Họ Tên <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="name" id="username" value="{{ $user->name }}">
                                    </p>
                                    @if($errors->has('name'))
				                        <div class="error-text">
					                        <i class="fa fa-exclamation"></i> {{$errors->first('name')}}
					                    </div>
					                @endif
                                    <p class="form-row form-row-wide">
                                        <label for="username">Số Điện Thoại <span class="required">*</span></label>
                                        <input type="number" class="input-text" min="0" name="phone" id="username" value="{{ $user->phone }}">
                                    </p>
                                     @if($errors->has('phone'))
				                        <div class="error-text">
					                        <i class="fa fa-exclamation"></i> {{$errors->first('phone')}}
					                    </div>
					                @endif
                                    <p class="form-row form-row-wide">
                                        <label for="username">Email <span class="required">*</span></label>
                                        <input type="email" class="input-text" name="email" id="username" value="{{ $user->email }}">
                                    </p>
                                     @if($errors->has('email'))
				                        <div class="error-text">
					                        <i class="fa fa-exclamation"></i> {{$errors->first('email')}}
					                    </div>
					                @endif
                                    <p class="form-row form-row-wide">
                                        <label for="address">Địa Chỉ <span class="required"></span></label>
                                        <input class="input-text" type="text" name="address" id="address" value="{{ $user->address }}" >
                                    </p>

                                    <p class="form-row form-row-wide">
                                        <label for="avatar">Ảnh Đại Diện <span class="required"></span></label>
                                        <input class="input-text form-control file-input" type="file" name="avatar" id="avatar" value="{{ $user->avatar }}">
                                    </p>
                                </div>
                                <div class="form-action">
                                    <div class="actions-log">
                                        <input type="submit" class="button" name="login" value="Cập Nhật">
                                    </div>
                                </div>
                            </form>
                        </div> 
       		 		</div>
        			<!-- account-details Area end -->
					<div class="back-button">
						<a href="{{route('user.dashboard')}}" class="btn btn-default"><i class="fa fa-angle-double-left"></i> Trở về</a>
					</div>
					</div>
				</div>
			</div>
		</div>


		<!-- wishlist-area-end -->
@stop
