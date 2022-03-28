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
								<li class="category3"><span>Bài Viết</span></li>
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
						<div class="col-md-3 col-sm-12 col-xs-12 text-left">
						<div class="topbar-left">
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="{{ asset('theme_fontend/img/bar-ping.png') }}" alt=""></div>
									<h2>Bài viết</h2>
								</div>
							</aside>
							
						</div>
					</div>
				<div class="row">	
					<!-- right sidebar start -->
					<div class="col-md-9 col-sm-12 col-xs-12">
						<!-- product-row start -->
						<div class="tab-content">							
							<!-- list view -->
							<div class="tab-pane fade in active" id="shop-list-tab">
								<div class="list-view">
								@if(isset($articles))
									@foreach($articles as $article)
									<!-- single-product start -->
									<div class="product-list-wrapper">
										<div class="single-product" style="margin-bottom: 15px;">								
											<div class="col-md-3 col-sm-3 col-xs-12">
												<div class="product-img">
													<a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">
														<img class="primary-image" src="{{ asset(pare_url_file($article->a_avatar)) }}" alt="" />
                                                        <img class="secondary-image" src="{{ asset(pare_url_file($article->a_avatar)) }}" alt="" />
													</a>
												</div>								
											</div>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<div class="product-content">
													<h1 class="product-name2"><a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}">{{ $article->a_name}}</a></h1>
													<div class="rating-price">	
														<div class="pro-rating">
															<a href="{{ route('get.detail.article',[$article->a_slug,$article->id]) }}"><i class="fa fa-clock-o"></i> {{ date_format($article->created_at, 'H:i Y-m-d ')}}</a>
														</div>					
													</div>
													<div class="product-desc">
														<p class="article">{{ $article->a_description}}</p>
													</div>										
												</div>									
											</div>
										</div>
									</div>
									<!-- single-product end -->
									@endforeach
								@endif	
								</div>
							</div>
							<!-- shop toolbar start -->
							<div class="shop-content-bottom">
								<div class="shop-toolbar btn-tlbr">
									<div class="col-md-12 col-sm-12 col-xs-12 text-center">
										{{ $articles->links('vendor.pagination.custom') }}
									</div>
								</div>
							</div>
						</div>
						<!-- shop toolbar end -->
					</div>
				</div>
				<!-- right sidebar end -->
			</div>
		</div>
		@include('components.article')
	</div>
	<!-- shop-with-sidebar end -->
	
@stop
