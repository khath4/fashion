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
                                    <a href="index.html">Trang Chủ</a>
                                    <span><i class="fa fa-angle-right"></i></span>
                                </li>
                                <li class="category3"><span>Đăng Ký</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs area end -->
        <!-- account-details Area Start -->
        <div class="customer-login-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="customer-login my-account">
                            <form method="post" class="login" action="">
                                @csrf
                                <div class="form-fields">
                                    <h2>Đăng Ký</h2>
                                    <p class="form-row form-row-wide">
                                        <label for="username">Họ Tên <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="name" id="username" value="{{ old('name') }}">
                                    </p>
                                     @if($errors->has('name'))
                                       <div class="error-text">
                                           <i class="fa fa-exclamation"></i> {{$errors->first('name')}}
                                       </div>
                                    @endif
                                     <p class="form-row form-row-wide">
                                        <label for="username">Số Điện Thoại <span class="required">*</span></label>
                                        <input type="number" class="input-text" name="phone" id="username" value="{{ old('phone') }}">
                                    </p>
                                    @if($errors->has('phone'))
                                        <div class="error-text">
                                            <i class="fa fa-exclamation"></i> {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                    <p class="form-row form-row-wide">
                                        <label for="username">Email <span class="required">*</span></label>
                                        <input type="email" class="input-text" name="email" id="username" value="{{ old('email') }}">
                                    </p>
                                    @if($errors->has('email'))
                                        <div class="error-text">
                                            <i class="fa fa-exclamation"></i> {{$errors->first('email')}}
                                        </div>
                                    @endif
                                    <p class="form-row form-row-wide">
                                        <label for="password">Mật Khẩu <span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password" id="password">
                                        <a href="javascript:;void(0)" class="" ><i class="fa fa-eye"></i></a>
                                    </p>
                                    @if($errors->has('password'))
                                        <div class="error-text">
                                            <i class="fa fa-exclamation"></i> {{$errors->first('password')}}
                                        </div>
                                    @endif
                                    <p class="form-row form-row-wide">
                                        <label for="password_comfirm">Nhập Lại Mật Khẩu <span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password_comfirm" id="password_comfirm">
                                        <a href="javascript:;void(0)" class="" ><i class="fa fa-eye"></i></a>
                                    </p>
                                    @if($errors->has('password_comfirm'))
                                        <div class="error-text">
                                            <i class="fa fa-exclamation"></i> {{$errors->first('password_comfirm')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-action">
                                    <p class="lost_password"> <a href="{{ route('get.password') }}">Quên mật khẩu ?</a> <a href="{{ route('get.login')}}"> Đăng nhập</a></p>
                                    <div class="actions-log">
                                        <input type="submit" class="button" name="login" value="Đăng Ký">
                                    </div>
                                    <label for="rememberme" class="inline"> 
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Nhớ tài khoản </label>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if(isset($register))
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="img-element">
                            @foreach($register as $item)
                                <a href="{{$item->banner_link}}"><img src="{{ asset(pare_url_file($item->banner_avatar)) }}" alt="banner1"></a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- account-details Area end -->
@stop
@section('script')
    <script>
        $(function(){
            $(".form-row-wide a").click(function(event) {
                let $this = $(this);
                if($this.hasClass('active'))
                {
                    $this.parents('.form-row-wide').find('input').attr('type','password');
                    $this.removeClass('active');
                }
                else
                {
                    $this.parents('.form-row-wide').find('input').attr('type','active');
                    $this.addClass('active');
                }
            });
        });
    </script>
@stop