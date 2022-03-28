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
								<li class="category3"><span>Đổi Mật Khẩu</span></li>
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
	                                    <h2>Đổi Mật Khẩu</h2>
	                                    <p class="form-row form-row-wide">
	                                        <label for="username">Mật Khẩu Cũ <span class="required">*</span></label>
	                                        <input type="password" class="input-text" name="password_old" id="username" value="" >
	                                        <a href="javascript:;void(0)" class="" ><i class="fa fa-eye"></i></a>
	                                        @if($errors->has('password_old'))
					                           <div class="error-text">
					                              <i class="fa fa-exclamation"></i> {{$errors->first('password_old')}}
					                           </div>
					                        @endif
	                                    </p>
	                                     <p class="form-row form-row-wide">
	                                        <label for="username">Mật Khẩu Mới <span class="required">*</span></label>
	                                        <input type="password" class="input-text" min="0" name="password" id="username" value="" >
	                                        <a href="javascript:;void(0)" class="" ><i class="fa fa-eye"></i></a>
	                                        @if($errors->has('password'))
					                           <div class="error-text">
					                              <i class="fa fa-exclamation"></i> {{$errors->first('password')}}
					                           </div>
					                        @endif
	                                    </p>
	                                    <p class="form-row form-row-wide">
	                                        <label for="username">Nhập Lại Mật Khẩu Mới <span class="required">*</span></label>
	                                        <input type="password" class="input-text" name="password_comfirm" id="username" value="" >
	                                        <a href="javascript:;void(0)" class="" ><i class="fa fa-eye"></i></a>
	                                        @if($errors->has('password_comfirm'))
					                           <div class="error-text">
					                              <i class="fa fa-exclamation"></i> {{$errors->first('password_comfirm')}}
					                           </div>
					                        @endif
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
@section('script')
	<script>
		$(function(){
			$(".form-row-wide a").click(function(event) {
				let $this = $(this);
				if($this.hasClass('active'))
				{
					$this.parents('.form-row-wide').find('input').attr('type','password');
					$this.removeClass('active');
				}
				else
				{
					$this.parents('.form-row-wide').find('input').attr('type','active');
					$this.addClass('active');
				}
			});
		});
	</script>
@stop