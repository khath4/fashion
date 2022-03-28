        <header class="short-stor">
            <div class="container-fluid">
                <div class="row">
                    <!-- logo start -->
                    <div class="col-md-3 col-sm-12 text-center nopadding-right">
                        <div class="top-logo">
                            <a href="index.html"><img src="{{ asset('theme_fontend/img/logo.gif') }}" alt="" /></a>
                        </div>
                    </div>
                    <!-- logo end -->
                    <!-- mainmenu area start -->
                    <div class="col-md-5 text-center">
                        <div class="mainmenu">
                            <nav>
                                <ul>
                                    <li class="expand"><a href="{{ route('home')}}"> {{__('title.index')}}</a></li>
                                	<li class="expand"><a href="#"> {{__('title.category')}}</a>
                                        <!-- <ul class="restrain sub-menu">
                                        @if(isset($categories))
                                        	@foreach($categories as $category)
                                            	<li><a href="{{ route('get.list.product',[$category->c_slug,$category->id]) }}">{{ $category->c_name }} ({{$category->c_total_product}})</a></li>
											@endforeach
                                        @endif
                                        </ul>   -->
                                        <div class="restrain mega-menu megamenu1">
                                            @if(isset($menuCategory))
                                            @foreach($menuCategory as $Menu)
                                            <span>
                                                <a class="mega-menu-title">{{$Menu->mc_name}}</a>
                                                @foreach($Menu->category as $category)
                                                    @if($category->c_active == 1)
                                                    <a href="{{ route('get.list.product',[$category->c_slug,$category->id]) }}">{{ $category->c_name }} ({{$category->c_total_product}})</a>
                                                    @endif
                                                @endforeach
                                            </span>
                                            @endforeach
                                            @endif
                                            @if(isset($footer_category))
                                                @foreach($footer_category as $item)
                                                <span class="block-last">
                                                    <img src="{{ asset(pare_url_file($item->banner_avatar)) }}" alt="" />
                                                </span>
                                                @endforeach
                                            @endif
                                        </div>                                 
                                    </li>  

                                    <li class="expand"><a href="{{ route('get.article') }}"> {{__('title.blog')}}</a></li>
                                    <li class="expand"><a href="{{ route('get.about')}}">{{__('title.about')}}</a></li>
                                    <li class="expand"><a href="{{ route('get.contact') }}">{{__('title.contact')}}</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- mobile menu start -->
                        <div class="row">
                            <div class="col-sm-12 mobile-menu-area">
                                <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                                    <span class="mobile-menu-title">Menu</span>
                                    <nav>
                                        <ul>
                                            <li><a href="{{ route('home') }}"> {{__('title.index')}}</a></li>
                                            <li><a> {{__('title.category')}}</a>
                                                <ul>
                                                    @if(isset($menuCategory))
                                                    @foreach($menuCategory as $Menu)
                                                    <li><a href="shop-grid.html">{{$Menu->mc_name}}</a>
                                                        <ul>
                                                            @foreach($Menu->category as $category)
                                                                <a href="{{ route('get.list.product',[$category->c_slug,$category->id]) }}">{{ $category->c_name }} ({{$category->c_total_product}})</a>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('get.article') }}"> {{__('title.blog')}}</a></li>
                                            <li><a href="{{ route('get.about')}}"> {{__('title.about')}}</a></li>
                                            <li><a href="{{ route('get.contact') }}"> {{__('title.contact')}}</a></li>
                                            @if(Auth::check())
                                            <li><a href="{{ route('user.dashboard') }}"> {{__('title.profile')}}</a>
                                                <ul>
                                                    <li class="text-center"><a href="{{ route('user.dashboard') }}">{{ get_data_user('web','name')}}</a></li>
                                                    <li class="text-center"><a href="{{ route('user.dashboard') }}">{{__('title.whish')}}</a></li>
                                                    <li class="text-center"><a href="{{ route('get.logout.user') }}">{{__('title.logout')}}</a></li>

                                                </ul>
                                            </li>
                                            @else
                                                <li><a href="{{ route('get.login')}}"> {{__('title.login')}}</a></li>
                                                <li><a href="{{ route('get.register') }}"> {{__('title.resign')}}</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>                      
                            </div>
                        </div>
                        <!-- mobile menu end -->
                    </div>
                    <!-- mainmenu area end -->
                    <!-- top details area start #nopadding-left-->
                    <div class="col-md-4 col-sm-12 text-center">
                        <div class="top-detail">
                            <!-- language division start -->
                            <div class="disflow">
                                <div class="expand lang-all disflow">
                                    @if(__('title.flag') == 'vi')
                                        <a><img src="{{ asset('theme_fontend/img/country/vn.png') }}" class="country_flag" alt="">{{ __('title.lang') }}</a>
                                    @else
                                        <a><img src="{{ asset('theme_fontend/img/country/en.gif') }}" class="country_flag" alt="">{{ __('title.lang') }}</a>
                                    @endif
                                    <ul class="restrain language">
                                        <li><a href="{{ route('get.languages',['vi'])}}"><img src="{{ asset('theme_fontend/img/country/vn.png') }}" class="country_flag" alt="">{{ __('title.vi') }}</a></li>
                                        <li><a href="{{ route('get.languages',['en'])}}"><img src="{{ asset('theme_fontend/img/country/en.gif') }}" alt="">{{ __('title.en') }}</a></li>
                                    </ul>
                                </div>
                                @if(Auth::check())
                                <div class="expand lang-all disflow">
                                    <a href="{{ route('user.dashboard') }}">{{get_data_user('web','name')}}</a>
                                </div>
                                @else
                                <div class="expand lang-all disflow">
                                    <a href="{{ route('get.login') }}">Đăng Nhập</a>
                                </div>
                                @endif
                            </div>
                            <!-- language division end -->
                            <!-- addcart top start -->
                            <div class="disflow">
                                <div class="circle-shopping expand">
                                    <div class="shopping-carts text-right">
                                        <div class="cart-toggler">
                                            <a href="{{ route('get.list.shopping.cart') }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a href="{{ route('get.list.shopping.cart') }}"><span class="cart-quantity">{{ \Cart::count() }}</span></a>
                                        </div>
                                        <div class="restrain small-cart-content">
                                            <ul class="cart-list">
                                            <?php  $cart = \Cart::content(); ?>
                                            @if(isset($cart))
                                            <?php $i = 1 ?>
                                                @foreach($cart as $key => $product)
                                                <li>
                                                    <a class="sm-cart-product" href="{{ route('get.detail.product',[$product->options->slug,$product->id]) }}">
                                                        <img src="{{ asset(pare_url_file($product->options->image)) }}" alt="">
                                                    </a>
                                                    <div class="small-cart-detail">
                                                        <a class="remove" href="{{route('get.shopping.delete',$key)}}"><i class="fa fa-times-circle"></i></a>
                                                        <!-- <a href="#" class="edit-btn"><img src="{{ asset('theme_fontend/img/btn_edit.gif') }}" alt="Edit Button" /></a> -->
                                                        <a class="small-cart-name" href="{{ route('get.detail.product',[$product->options->slug,$product->id]) }}">{{$product->name}}</a>
                                                        <span class="quantitys"><strong>{{ $product->qty }}</strong>x<span>{{ number_format($product->qty * $product->price,0,',','.') }}<i>VND</i></span></span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            <?php $i++ ?>
                                            @endif
                                            </ul>
                                            <p class="total">Tạm Tính: <span class="amount">{{ Cart::subtotal(0) }} VND</span></p>
                                            <p class="buttons"><a href="{{ route('get.form.pay') }}" class="button">Thanh Toán</a></p>
                                            <p class="buttons"><a href="{{ route('get.form.pay.online') }}" class="button">Thanh Toán Online</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- addcart top start -->
                            <!-- search divition start -->
                            <div class="disflow">
                                <div class="header-search expand">
                                    <div class="search-icon fa fa-search"></div>
                                    <div class="product-search restrain">
                                        <div class="container nopadding-right">
                                            <form action="{{route('get.search')}}" id="searchform" method="get">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search" maxlength="128" placeholder="Tên sản phẩm..." required="">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- search divition end -->
                            <div class="disflow">
                                <div class="expand dropps-menu">
                                    <a href="#"><i class="fa fa-align-right"></i></a>
                                    <ul class="restrain language">
                                    @if(Auth::check())
                                        <li><a href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i> Tài Khoản </a></li>
                                        <li><a href="{{ route('user.wish')}}"><i class="fa fa-heart"></i> Yêu Thích</a></li>
                                        <li><a href="{{ route('get.logout.user') }}"><i class="fa fa-sign-out"></i> Thoát</a></li>
                                    @else
                                        <li><a href="{{ route('get.register') }}"><i class="fa fa-directions"></i> Đăng Ký</a></li>
                                        <li><a href="{{ route('get.login') }}"><i class="fa fa-sign-in"></i> Đăng Nhập</a></li>
                                    @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- top details area end -->
                </div>
            </div>
        </header>