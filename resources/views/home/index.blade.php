@extends('layouts.app')
@section('content')
	    <!-- start home slider -->
        @include('components.slide')
        <!-- end home slider -->
        <!-- product section start -->
        <div class="our-product-area">
            <div class="container">
                <!-- area title start -->
                <div class="area-title">
                    <h2>Sản Phẩm Nổi Bật</h2>
                </div>
                <!-- area title end -->
                <!-- our-product area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="features-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">Bán Chạy</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">Ngẩu Nhiên</a></li>
                            </ul>
                            <!-- Tab pans -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <div class="row">
                                        <div class="features-curosel">
                                            @if(isset($productHot))
                                                @foreach($productHot as $product)
                                            <div class="col-lg-12 col-md-12">
                                                <!-- single-product start -->
                                                <div class="single-product first-sale">
                                                    <div class="product-img">
                                                        @if($product->pro_qty == 0)
                                                            <span class="qty_cus">Tạm hết hàng</span>
                                                        @endif
                                                        @if($product->pro_sale > 0)
                                                            <span class="sale_cus">Đã giảm {{ $product->pro_sale}}%</span>
                                                        @endif
                                                        <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                                            <img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
                                                            <img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
                                                        </a>
                                                        <div class="action-zoom">
                                                            <div class="add-to-cart">
                                                                <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="add-to-wishlist">
                                                                        <a href="#" title="Thêm vào yêu thích"><i class="fa fa-heart"></i></a>
                                                                    </div>
                                                                    <div class="compare-button">
                                                                        <a href="{{ route('add.shopping.cart',$product->id) }}" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                                                                    </div>                                  
                                                                </div>
                                                                <div class="quickviewbtn">
                                                                    <a href="#" title="Mua ngay"><i class="fa fa-retweet"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ format_price($product->pro_price,$product->pro_sale) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <?php 
                                                            $totalDetail = 0;
                                                            if($product->pro_total_ratings > 0)
                                                            {
                                                                $totalDetail = round($product->pro_total_number / $product->pro_total_ratings , 2);
                                                            }
                                                        ?>                                                     
                                                        <div class="cat-rating text-center">
                                                           @for($i = 1; $i <= 5 ; $i++)
                                                                <a><i class="fa fa-star {{ $i <= $totalDetail ? 'active' : ''}}"></i></a>
                                                            @endfor
                                                        </div>
                                                        <h2 class="product-name"><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h2>
                                                       <!--  <p>{{ $product->pro_description }}</p> -->
                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                            @endforeach
                                        @endif
                                        </div>                             
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <div class="row">
                                        <div class="features-curosel">
                                        @if(isset($productRd))
                                            @foreach($productRd as $product)
                                            <div class="col-lg-12 col-md-12">
                                                <!-- single-product start -->
                                                <div class="single-product first-sale">
                                                    <div class="product-img">
                                                        @if($product->pro_qty == 0)
                                                            <span class="qty_cus">Tạm hết hàng</span>
                                                        @endif
                                                        @if($product->pro_sale > 0)
                                                            <span class="sale_cus">Đã giảm {{ $product->pro_sale}}%</span>
                                                        @endif
                                                        <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                                            <img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
                                                            <img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
                                                        </a>
                                                        <div class="action-zoom">
                                                            <div class="add-to-cart">
                                                                <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="actions">
                                                            <div class="action-buttons">
                                                                <div class="add-to-links">
                                                                    <div class="add-to-wishlist">
                                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                    </div>
                                                                    <div class="compare-button">
                                                                        <a href="{{ route('add.shopping.cart',$product->id) }}" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                                                                    </div>                                  
                                                                </div>
                                                                <div class="quickviewbtn">
                                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ format_price($product->pro_price,$product->pro_sale) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <?php 
                                                            $totalDetail = 0;
                                                            if($product->pro_total_ratings > 0)
                                                            {
                                                                $totalDetail = round($product->pro_total_number / $product->pro_total_ratings , 2);
                                                            }
                                                        ?>                                                     
                                                        <div class="cat-rating text-center">
                                                           @for($i = 1; $i <= 5 ; $i++)
                                                                <a><i class="fa fa-star {{ $i <= $totalDetail ? 'active' : ''}}"></i></a>
                                                            @endfor
                                                        </div>
                                                        <h2 class="product-name"><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h2>
                                                        <!-- <p>{{ $product->pro_description }}</p> -->
                                                    </div>
                                                </div>
                                                <!-- single-product end -->
                                            </div>
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
                <!-- our-product area end -->   
            </div>
        </div>
        @include('components.product_suggest')
        <!-- product section end -->
        <!-- banner-area start -->
        @include('components.banner')
        <!-- banner-area end -->
        <!-- product section start -->
        @include('components.new_product')
        <!-- product section end -->
        <div id="products-view"></div>
        <!-- latestpost area start -->
        @if(isset($articleNew))
        <div class="latest-post-area">
            <div class="container">
                <div class="area-title">
                    <h2>Bài Viết Mới</h2>
                </div>
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        @foreach($articleNew as $arNew)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id])}}">
                                        <img src="{{ asset(pare_url_file($arNew->a_avatar)) }}" alt=""/>
                                    </a>
                                </div>
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id])}}">{{ $arNew->a_name }}</a>
                                    </div>
                                    <div class="postexcerpt">
                                        <p>{{ $arNew->a_description }}</p>
                                        <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id])}}" class="read-more">Xem Thêm <i class="post-time2">{{ $arNew->created_at->format('H:i d-m-Y')}}</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- single latestpost end -->          
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- latestpost area end -->
        <!-- block category area start -->
        <div class="block-category">
            <div class="container">
                <div class="row">

                    @if(isset($categoriesHome))
                    <!-- featured block start -->
                    @foreach($categoriesHome as $categoryHome)
                    <div class="col-md-4">
                        <!-- block title start -->
                        <div class="block-title">
                            <h2>{{ $categoryHome->c_name }}</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        @if(isset($categoryHome->products))
                        <div class="block-carousel">
                            @foreach($categoryHome->products as $product)
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                       <!--  -->
                                        <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}"><img src="{{  asset(pare_url_file($product->pro_avatar)) }}" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h3>
                                        <div class="cat-price">{{ format_price($product->pro_price,$product->pro_sale) }}<p><span class="old-price">{{ number_format($product->pro_price,0,',','.') }} VND</span></p></div>
                                        <?php 
                                            $totalDetail = 0;
                                            if($product->pro_total_ratings > 0)
                                            {
                                                $totalDetail = round($product->pro_total_number / $product->pro_total_ratings , 2);
                                            }
                                        ?>
                                        <div class="cat-rating">
                                           @for($i = 1; $i <= 5 ; $i++)
                                                <a href="#"><i class="fa fa-star {{ $i <= $totalDetail ? 'active' : ''}}"></i></a>
                                            @endfor
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
               
                            </div>
                            @endforeach
                        @endif
                        </div>
                        <!-- block carousel end -->
                    </div>
                    @endforeach
                    <!-- featured block end -->
                    @endif
                </div>
            </div>
        </div>
        <!-- block category area end -->
        <!-- block category area start -->
        <div class="block-category">
            <div class="container">
                <div class="row">

                    @if(isset($BrandsHome))
                    <!-- featured block start -->
                    @foreach($BrandsHome as $brandhome)
                    <div class="col-md-4">
                        <!-- block title start -->
                        <div class="block-title">
                            <h2>{{ $brandhome->b_name }}</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        @if(isset($brandhome->products))
                        <div class="block-carousel">
                            @foreach($brandhome->products as $product)
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                       <!--  -->
                                        <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}"><img src="{{  asset(pare_url_file($product->pro_avatar)) }}" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h3>
                                        <div class="cat-price">{{ format_price($product->pro_price,$product->pro_sale) }}<p><span class="old-price">{{ number_format($product->pro_price,0,',','.') }} VND</span></p></div>
                                        <?php 
                                            $totalDetail = 0;
                                            if($product->pro_total_ratings > 0)
                                            {
                                                $totalDetail = round($product->pro_total_number / $product->pro_total_ratings , 2);
                                            }
                                        ?>
                                        <div class="cat-rating">
                                           @for($i = 1; $i <= 5 ; $i++)
                                                <a href="#"><i class="fa fa-star {{ $i <= $totalDetail ? 'active' : ''}}"></i></a>
                                            @endfor
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
               
                            </div>
                            @endforeach
                        @endif
                        </div>
                        <!-- block carousel end -->
                    </div>
                    @endforeach
                    <!-- featured block end -->
                    @endif
                </div>
            </div>
        </div>
        <!-- block category area end -->
        <!-- testimonial area start -->
        <div class="testimonial-area lap-ruffel">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="crusial-carousel">
                            <div class="crusial-content">
                                <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                                <span>BootExperts</span>
                            </div>
                            <div class="crusial-content">
                                <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                                <span>Lavoro Store!</span>
                            </div>
                            <div class="crusial-content">
                                <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                                <span>MR Selim Rana</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
        <!-- Brand Logo Area Start -->
        <div class="brand-area">
            <div class="container">
                <div class="row">
                    <div class="brand-carousel">
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg1-brand.jpg') }}" alt="" /></a></div>
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg2-brand.jpg') }}" alt="" /></a></div>
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg3-brand.jpg') }}" alt="" /></a></div>
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg4-brand.jpg') }}" alt="" /></a></div>
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg5-brand.jpg') }}" alt="" /></a></div>
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg2-brand.jpg') }}" alt="" /></a></div>
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg3-brand.jpg') }}" alt="" /></a></div>
                        <div class="brand-item"><a href="#"><img src="{{ asset('theme_fontend/img/brand/bg4-brand.jpg') }}" alt="" /></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Logo Area End --> 
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
            let routeRenderProduct = '{{ route('post.view.product')}}';
            check = false;
            $(document).on('scroll', function() 
            {   
                if($(window).scrollTop() > 150 && check == false) 
                {
                    check = true;
                    let products =  localStorage.getItem('products');
                    products = $.parseJSON(products);

                    if(products != null && products.length > 0)
                    {
                        $.ajax({
                            url : routeRenderProduct,
                            method : "POST",
                            data: { id : products},
                            success : function(result) 
                            {
                                $('#products-view').html('').append(result.data);    
                            }
                        });
                    }
                }
            });
        });
    </script>
@stop