@extends('admin::layouts.master')

@section('content')

	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản Phẩm</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Cập Nhật</li>
			  </ol>
			</nav>
 		</div>
 	</div>
	<!-- <div class="container-fluid"> -->
    	<div class="row">
    		<div class="col-md-12">
          		<label for="exampleInputEmail1"><h3 class="text-primary">Cập Nhật Sản Phẩm</h3></label>
    			@include ("admin::product.form")
    		</div>
    	</div>    
  <!--   </div> -->
@stop