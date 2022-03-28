 <footer>
            <!-- top footer area start -->
            <div class="top-footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="single-snap-footer">
                                <div class="snap-footer-title">
                                    <h4>Thông tin công ty</h4>
                                </div>
                                @if(isset($info))
                                    <div class="cakewalk-footer-content">
                                        <p class="footer-des">{{$info->a_description}}</p>
                                        <a href="{{route('get.about')}}" class="read-more">Xem thêm</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="single-snap-footer">
                                <div class="snap-footer-title">
                                    <h4>Thông tin</h4>
                                </div>
                                <div class="cakewalk-footer-content">
                                    <ul>
                                        <li><a href="{{ route('get.about')}}">Về chúng tôi</a></li>
                                        <li><a href="{{ route('get.shopping')}}">Thông tin giao hàng</a></li>
                                        <li><a href="{{ route('get.security')}}">Chính sách bảo mật</a></li>
                                        <li><a href="{{ route('get.policy')}}">Điều khoản sử dụng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <div class="single-snap-footer">
                                <div class="snap-footer-title">
                                    <h4>Tổng quan</h4>
                                </div>
                                <div class="cakewalk-footer-content">
                                    <ul>
                                        <li><a href="#">Tài khoản</a></li>
                                        <li><a href="#">Đăng nhập</a></li>
                                        <li><a href="#">Giỏ hàng</a></li>
                                        <li><a href="#">Sản phẩm yêu thích</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 hidden-sm">
                            <div class="single-snap-footer">
                                <div class="snap-footer-title">
                                    <h4>Khác</h4>
                                </div>
                                <div class="cakewalk-footer-content">
                                    <ul>
                                        <li><a href="#">Sitemap</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Advanced Search</a></li>
                                        <li><a href="#">Affiliates</a></li>
                                        <li><a href="#">Liên hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 hidden-sm">
                            <div class="single-snap-footer">
                                <div class="snap-footer-title">
                                    <h4>Theo dõi</h4>
                                </div>
                                <div class="cakewalk-footer-content social-footer">
                                    <ul>
                                        <li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a><span> Facebook</span></li>
                                        <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a><span> Google Plus</span></li>
                                        <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a><span> Twitter</span></li>
                                        <li><a href="https://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a><span> Youtube</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <!-- top footer area end -->
            <!-- info footer start -->
            @if(isset($info))
            <div class="info-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Địa Chỉ</h3>
                                    <p>{{$info->a_address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Điện Thoại</h3>
                                    <p>{{$info->a_phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Email Support</h3>
                                    <p>{{$info->a_email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 hidden-sm">
                            <div class="info-fcontainer">
                                <div class="infof-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="infof-content">
                                    <h3>Giờ mở cửa</h3>
                                    <p>{{$info->time_open}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- info footer end -->
            <!-- banner footer area start -->
            @if(isset($footer))
            <div class="banner-footer">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($footer as $item)
                        <div class="col-md-2 col-sm-2 col-xs-3 nopadding">
                            <div class="single-bannerfooter">
                                <a href="{{$item->banner_link}}">
                                    <img src="{{ asset(pare_url_file($item->banner_avatar)) }}" alt="" />
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <!-- banner footer area end -->
            <!-- footer address area start -->
            <div class="address-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <address>Copyright © <a href="http://bootexperts.com/">Trần Hoàng Kha.</a> All Rights Reserved</address>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="footer-payment pull-right">
                                <a href="#"><img src="{{ asset('theme_fontend/img/payment.png') }}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer address area end -->
        </footer>