@extends('admin::layouts.master')

@section('content')

	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item"><a href="{{ route('admin.get.list.about') }}">About</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Cập Nhật</li>
			  </ol>
			</nav>
 		</div>
 	</div>
	<!-- <div class="container-fluid"> -->
    	<div class="row">
    		<div class="col-md-12">
          		<label for="exampleInputEmail1"><h3 class="text-primary">Cập Nhật About</h3></label>
    			<form  action="" method="POST">
				   @csrf
				   <div class="form-group row">
				      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Email(*)</b></label>
				      <div class="col-sm-12">
				        <input type="email" class="form-control" placeholder="Email" name="a_email" value="{{ isset($about->a_email) ? $about->a_email : '' }}">
				         	@if($errors->has('a_email'))
				         	<div class="error-text">
				            	<i class="fas fa-exclamation"></i> {{$errors->first('a_email')}}
				         	</div>
				         	@endif
				      </div>
				   </div>
				   <div class="form-group row">
				      	<label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Điện Thoại(*)</b></label>
				      	<div class="col-sm-12">
					        <input type="number" class="form-control" placeholder="Số điện thoại" name="a_phone" value="{{ isset($about->a_phone) ? $about->a_phone : '' }}">
					        @if($errors->has('a_phone'))
					        <div class="error-text">
					            <i class="fas fa-exclamation"></i> {{$errors->first('a_phone')}}
					        </div>
					        @endif
				      </div>
				   </div>
				   <div class="form-group row">
				      	<label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Địa Chỉ(*)</b></label>
				      	<div class="col-sm-12">
				         	<input type="text" class="form-control" placeholder="Địa chỉ" name="a_address" value="{{ isset($about->a_address) ? $about->a_address : '' }}">
				         	@if($errors->has('a_address'))
					        <div class="error-text">
					            <i class="fas fa-exclamation"></i> {{$errors->first('a_address')}}
					        </div>
					        @endif
				      </div>
				   </div>
				   <div class="form-group row">
				      	<label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Time Open - Close(*)</b></label>
				      	<div class="col-sm-12">
				         	<input type="text" class="form-control" placeholder="Time Open - Close" name="time_open" value="{{ isset($about->time_open) ? $about->time_open : '' }}">
				         	@if($errors->has('a_phone'))
					        <div class="error-text">
					            <i class="fas fa-exclamation"></i> {{$errors->first('a_phone')}}
					        </div>
					        @endif
				      </div>
				   </div>
				   <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Mô Tả Ngắn(*)</b></label>
                     <div class="col-sm-12">
                        <textarea name="a_description" class="form-control" placeholder="Mô tả ngắn bài viết">{{ isset($about->a_description) ? $about->a_description : '' }}</textarea>
                        @if($errors->has('a_description'))
                        <div class="error-text">
                           <i class="fas fa-exclamation"></i> {{$errors->first('a_description')}}
                        </div>
                     @endif
                     </div>
                  </div>
				   <div class="form-group">
				      <a href="{{ route('admin.get.list.about') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
				      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
				   </div>
				</form>
    		</div>
    	</div>    
  <!--   </div> -->
@stop