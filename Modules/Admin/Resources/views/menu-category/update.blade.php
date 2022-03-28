@extends('admin::layouts.master')

@section('content')

	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item"><a href="{{ route('admin.get.list.menu-category') }}">Danh Mục Cha</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Cập Nhật</li>
			  </ol>
			</nav>
 		</div>
 	</div>
	<!-- <div class="container-fluid"> -->
    	<div class="row">
    		<div class="col-md-12">
          		<label for="exampleInputEmail1"><h3 class="text-primary">Cập Nhật Danh Mục Cha</h3></label>
    			@include ("admin::menu-category.form");
    		</div>
    	</div>    
  <!--   </div> -->
@stop