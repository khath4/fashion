<div class="col-md-3 col-sm-12">
	<aside class="widge-topbar">
		<div class="bar-title">
			<div class="bar-ping"><img src="{{ asset('theme_fontend/img/bar-ping.png') }}" alt=""></div>
			<h2>Tài Khoản</h2>
		</div>
	</aside>
	<aside>
		<div class="wish-left-menu">
			<ul>
				<li><a href="{{route('user.dashboard')}}">Tổng Quan</a></li>
				<li><a href="{{route('user.info')}}">Cập Nhật Thông Tin</a></li>
				<li><a href="{{ route('user.password')}}">Đổi Mật Khẩu</a></li>
				<li><a href="{{ route('user.wish')}}">Sản Phẩm Yêu Thích</a></li>
				<li><a href="#">Giỏ Hàng</a></li>
				<li><a href="#">Đánh Giá Sản Phẩm</a></li>
				<li><a href="{{ route('get.logout.user') }}"><i class="fa fa-sign-out"></i>Thoát</a></li>
			</ul>
		</div>
	</aside>
</div>