@extends('layouts.app')
@section('content')
			<!-- breadcrumbs area start -->
		@if(isset($articleDetail))
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
								<li class="home">
									<a href="{{ route('get.article')}}">Bài Viết</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>{{ $articleDetail->a_name}}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->

		<!-- hello about start -->
		<div class="home-hello-info">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="f-title text-center">
							<h3 class="title text-uppercase">Bài Biết</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						<div class="about-page-cntent">
							<h3>{{ $articleDetail->a_name}}</h3>
							<blockquote>
								<p>{{ $articleDetail->a_description}}</p>
							</blockquote>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="img-element">
							<img src="{{ asset(pare_url_file($articleDetail->a_avatar))}}" alt="banner1">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- hello about end -->
		<!-- service about start -->
		<div class="our-services-info">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="f-title">
							{!! $articleDetail->a_content !!}
						</div>
					</div>
				</div><!-- End .row -->
				<div class="row text-center">
					<div class="our-services-inner">
						
					</div><!-- End .our-services-inner -->
				</div><!-- End .row -->
			</div><!-- End .container -->
		</div>
		<!-- service about end -->
		@endif
		        <!-- latestpost area start -->
		@include('components.article')
@stop