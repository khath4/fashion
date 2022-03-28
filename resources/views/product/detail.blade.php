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
								<li class="home">
									<a href="{{ route('get.list.product',[$cateProduct->c_slug,$cateProduct->id])}}">{{ $cateProduct->c_name }}</a>
									<span><i class="fa fa-angle-right"></i></span>
								</li>
								<li class="category3"><span>{{ $productDetail->pro_name }}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		@if(isset($productDetail))
		<div class="product-details-area" id="content_product" data-id="{{ $productDetail->id }}">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
									<img id="zoom1" src="{{ asset(pare_url_file($productDetail->pro_avatar))}}" data-zoom-image="{{ asset(pare_url_file($productDetail->pro_avatar))}}" alt="big-1">
								</a>
							</div>
							<div class="single-zoom-thumb">
								<ul class="bxslider" id="gallery_01">
									<li>
										<a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset('theme_fontend/img/product-details/big-1-1.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-1-1.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-1-1.jpg') }}" alt="zo-th-1" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{ asset('theme_fontend/img/product-details/big-1-2.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-1-2.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-1-2.jpg') }}" alt="zo-th-2"></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{ asset('theme_fontend/img/product-details/big-1-3.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-1-3.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-1-3.jpg') }}" alt="ex-big-3" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{ asset('theme_fontend/img/product-details/big-4.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-4.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-4.jpg') }}" alt="zo-th-4"></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{ asset('theme_fontend/img/product-details/big-5.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-5.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-5.jpg') }}" alt="zo-th-5" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{ asset('theme_fontend/img/product-details/big-6.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-6.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-6.jpg') }}" alt="ex-big-3" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{ asset('theme_fontend/img/product-details/big-7.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-7.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-7.jpg') }}" alt="ex-big-3" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{ asset('theme_fontend/img/product-details/big-8.jpg') }}" data-zoom-image="{{ asset('theme_fontend/img/product-details/ex-big-8.jpg') }}"><img src="{{ asset('theme_fontend/img/product-details/th-8.jpg') }}" alt="ex-big-3" /></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php 
	                    $totalDetail = 0;
	                    if($productDetail->pro_total_ratings > 0)
	                    {
	                      	$totalDetail = round($productDetail->pro_total_number / $productDetail->pro_total_ratings , 2);
	                    }
	                ?>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<h1 class="product-name2"><a href="#">{{ $productDetail->pro_name }}</a></h1>
									<div class="rating-price">	
										<div class="pro-rating">
											@for($i = 1; $i <= 5 ; $i++)
												<a href="#"><i class="fa fa-star {{ $i <= $totalDetail ? 'active' : ''}}"></i></a>
											@endfor
										</div>
										<div class="price-boxes">											
											<span class="new-price">{{ format_price($productDetail->pro_price,$productDetail->pro_sale) }}</span>
										</div>
										@if($productDetail->pro_sale > 0)
											<span class="sale-price"><del>{{ number_format($productDetail->pro_price,0,',','.') }} VND</del></span>
											<b>- {{ $productDetail->pro_sale }} %</b>
										@endif
									</div>
									<div class="product-desc">
										<p class="article">{{ $productDetail->pro_description }}</p>
									</div>
									<p class="availability in-stock"><b>Trạng thái:</b> <span>Còn Hàng</span></p>
									<p class="availability in-stock"><b>Danh mục:</b> <span>{{ $cateProduct->c_name }}</span></p>
									<p class="availability in-stock"><b>Thương hiệu:</b> <span>{{ $brand->b_name }}</span></p>
									<div class="actions-e">
										<div class="action-buttons-single">
											<div class="inputx-content">
												<label for="qty">Hiện có:</label>
												<input type="text" name="qty" id="qty" value="{{$productDetail->pro_qty}}" title="Qty" class="input-text qty" readonly="">
											</div>
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
												</div>									
											</div>
											<div class="add-to-cart">
												<a href="{{ route('add.shopping.cart',$productDetail->id) }}">Thêm Vào Giỏ Hàng</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 padd_0">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab">Thông Tin Sản Phẩm</a></li>
							<li class=""><a href="#messages" data-toggle="tab"> Đánh Giá Sản Phẩm ({{ $productDetail->pro_total_ratings }})</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
									<p>{!! $productDetail->pro_content !!}</p>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="single-post-comments">
									<div class="comments-area">
										@if(isset($ratings))
										@if($productDetail->pro_total_ratings > 0)
										<h3 class="comment-reply-title">Danh Sách Đánh Giá Sản Phẩm</h3>
											<div class="comments-list">
												@foreach($ratings as $rating)
												<ul>
													<li>
														<div class="comments-details">
															<div class="comments-list-img">
															@if($rating->user->avatar == NULL)
						                                		<img src="{{ asset('theme_fontend/img/unnamed.png') }}" alt="User-Profile-Image">
							                                @else
							                                	<img src="{{ asset(pare_url_file($rating->user->avatar)) }}" alt="User-Profile-Image">
							                                @endif
															</div>
															<div class="comments-content-wrap">
																<span>
																	<b><a href="#">{{ isset($rating->user->name) ? $rating->user->name : '' }} </a></b>
																	<b class="check"><i class="fa fa-check-circle"></i> Chứng nhận đã mua hàng</b>
																</span>
																<p><span>
																		@for($i = 1 ; $i <= 5 ; $i ++)
																			<i class="fa fa-star {{ $i <= $rating->rt_number ? 'active' : '' }}"></i>
																		@endfor
																	</span>{{ $rating->rt_content}}
																</p>
																	<span class="post-time"><i class="fa fa-clock-o"></i>{{ date(' H:i d-m-Y ', strtotime($rating->created_at))}}</span>
															</div>
														</div>
													</li>
												</ul>
												@endforeach
												</div>
											@endif
										@endif
										<div class="shop-content-bottom">
											<div class="shop-toolbar btn-tlbr">
												<div class="col-xs-12 text-center">
													{{ $ratings->appends(request()->query())->links('vendor.pagination.custom') }}
												</div>
											</div>
										</div>
									</div>						
								</div>
							</div>
							<div class="component_ratings">
								@if($productDetail->pro_total_ratings > 0)
								<h4>Đánh Giá Sản Phẩm</h4>
								<div class="component_ratings_content">
									<div class="ratings_item">
										<span class="fa fa-star"><b>{{ $totalDetail }}</b></span>
									</div>
									<div class="list_ratings">
										@foreach($arrayRatings as $keys => $arrayRating)
										<?php 
											$persent = round(($arrayRating['total'] / $productDetail->pro_total_ratings ) * 100,1);
										?>
										<div class="item">
											<div class="head_item">{{ $keys }}<span class="fa fa-star"></span> {{$persent}}%</div>
											<div class="body_item"><span><b style="width: {{$persent}}%"></b></span></div>
											<div class="footer_item"><a><small>{{ $arrayRating['total'] }} Đánh Giá</small></a></div>
										</div>
										@endforeach
									</div>
								</div>
								@else
									<h4>Đánh Giá Sản Phẩm (Chưa có đánh giá)</h4>
								@endif

								@if(get_data_user('web'))
									@if($check == 1)
									<div class="send_ratings">
										<a href="#" class="btn btn-primary js_ratings_action">Đánh Giá</a>
									</div>
									@endif
								@else
									<div class="send_ratings">
									<a href="{{ route('get.login') }}" class="btn btn-primary">Đăng Nhập Để Đánh Giá</a>
								</div>
								@endif
								<div class="form_ratings hide">
									<div class="choice_ratings">
										<p class="text">Chọn đánh giá của bạn</p>
										<span class="list_star">
											@for($i= 1; $i<= 5 ; $i++)
												<i class="fa fa-star" data-key="{{ $i }}"></i>
											@endfor
										</span>
										<span class="list_text"></span>
										<input type="hidden" class="number_ratings" value="">
									</div>
									<div class="form_footer_ratings">
										<textarea class="form-control" cols="30" rows="5" id="rt_content" required=""></textarea>
									</div>
									<div class="form_footer_ratings">
										<a href="{{ route('post.ratings.product',$productDetail->id)}}" class="btn btn-primary js_ratings_product"><i class="fa fa-paper-plane"></i> Gửi Đánh Giá</a>
									</div>
								</div>	
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
		@endif
		<!-- product-details Area end -->
		<!-- product section start -->
		@include('components.new_product')
		<!-- product section end -->
@stop

@section('script')
  <!-- ratings star -->
  <script>
  	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	  	
    $(function(){
      	let listStar = $(".list_star .fa");

      	listRatingsText = {
			1 : 'Không thích',
			2 : 'Tạm được',
			3 : 'Bình thường',
			4 : 'Rất tốt',
			5 : 'Tuyệt vời',
		};

      	listStar.mouseover(function(event) {
          	let $this = $(this);
          	let number =  $this.attr('data-key');
          	
         	listStar.removeClass('ratings_active');
         	$('.number_ratings').val(number);
          	$.each(listStar, function(key,value){
          		if(key + 1 <= number){
          			$(this).addClass('ratings_active');
          		}
          	});

          	$('.list_text').text('').text(listRatingsText[number]).show();
      	});

      	$('.js_ratings_action').click(function(event) {
      		event.preventDefault();
      		if($(".form_ratings").hasClass('hide'))
      		{
      			$(".form_ratings").addClass('active').removeClass('hide');
      			$(".js_ratings_action").addClass('btn-danger').removeClass('btn-primary');
      			$(".js_ratings_action").text('Đóng');
      		}
      		else
      		{
      			$(".form_ratings").addClass('hide').removeClass('active');
      			$(".js_ratings_action").addClass('btn-primary').removeClass('btn-danger');
      			$(".js_ratings_action").text('Đánh Giá');
      		}
      	});

      	$('.js_ratings_product').click(function(event) {
      		event.preventDefault();
      		let content =  $('#rt_content').val();
      		let number = $('.number_ratings').val();
      		let url = $(this).attr('href');

      		if(content && number)
      		{
      			$.ajax({
      				url : url,
      				type : 'POST',
      				data : {
      					number :  number,
      					content : content
      				}
      			}).done(function(result){
      				if(result.code == 1)
      				{
      					swal("Thông báo!", "Gửi đánh giá thành công.");
      					setInterval('location.reload()', 2000);
      				}
      			});
      		}
      	});
      	
      	let idProduct = $('#content_product').attr('data-id');

      	let products = localStorage.getItem('products');

      	if(products ==  null)
      	{
      		arrayProducts =  new Array();
      		arrayProducts.push(idProduct)	
      		localStorage.setItem('products',JSON.stringify(arrayProducts))
      	}
      	else
      	{
      		products = $.parseJSON(products)
      		if(products.indexOf(idProduct) == -1)
      		{
      			products.push(idProduct);
      			localStorage.setItem('products',JSON.stringify(products))
      		}
      	}
      
    });
  </script>
@stop