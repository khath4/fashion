@extends('layouts.app')
@section('content')
		<!-- banner-area start -->
        @include('components.banner')
        <!-- banner-area end -->
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
								@if(isset($cateProduct->c_name))
									<li class="category3"><span>{{ $cateProduct->c_name }}</span></li>
								@else
									<li class="category3"><span>Tìm Kiếm</span></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- shop-with-sidebar Start -->
		<div class="shop-with-sidebar">
			<div class="container">
				<div class="row">
					<!-- left sidebar start -->
					<div class="col-md-3 col-sm-12 col-xs-12 text-left">
						<div class="topbar-left">
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="{{ asset('theme_fontend/img/bar-ping.png') }}" alt=""></div>
									@if(isset($cateProduct->c_name))
										<h2>{{ $cateProduct->c_name }}</h2>
									@else
										<h2>Tìm Kiếm</h2>
									@endif
								</div>
							</aside>
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Thương Hiệu</h6>
								</div>
								<ul class="sidebar-tags">
								@if(isset($brands))
									@foreach($brands as $brand)
									<li><a href="{{route('get.list.brand',[$brand->b_slug,$brand->id])}}">{{ $brand->b_name}}</a><span> ({{$brand->b_total_product}})</span></li>
									@endforeach
								@endif
								</ul>
							</aside>
        				@include('components.category_brand')
				</div>
			</div>
		</div>
		<!-- shop-with-sidebar end -->

@stop

@section('script')
	<script>
  $( function() {
  	let $this = $(this);
    $( "#slider-range" ).slider({
      range: true,
      min: {{ $min}},
      max: {{ $max}},
      step:10000,
      values: [ {{ $start}},{{ $end}} ],
      slide: function( event, ui ) {
        $( "#amount_start" ).val(ui.values[ 0 ]).simpleMoneyFormat();
        $( "#amount_end" ).val(ui.values[ 1 ]).simpleMoneyFormat();
        $( "#start_price" ).val(ui.values[ 0 ]);
        $( "#end_price" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount_start" ).val($( "#slider-range" ).slider( "values", 0 )).simpleMoneyFormat();
    $( "#amount_end" ).val($( "#slider-range" ).slider( "values", 1 )).simpleMoneyFormat();
  } );
  </script>

  <script>
  	$(function(){
  		$('.orderby').change(function(event) {
  			$('#form_order').submit();
  		});
  	});
  </script>
@stop	