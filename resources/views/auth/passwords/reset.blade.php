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
                                <li class="category3"><span>Lấy Lại Mật Khẩu</span></li>
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
                                    <h2>Lấy Lại Mật Khẩu</h2>
                                    <p class="form-row form-row-wide">
                                        <label for="password">Mật Khẩu Mới<span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password" id="password" >
                                    </p>
                                    @if($errors->has('password'))
                                        <div class="error-text">
                                            <i class="fa fa-exclamation"></i> {{$errors->first('password')}}
                                        </div>
                                    @endif
                                    <p class="form-row form-row-wide">
                                        <label for="password_comfirm">Nhập Lại Mật Khẩu Mới<span class="required">*</span></label>
                                        <input class="input-text" type="password" name="password_comfirm" id="password_comfirm" >
                                    </p>
                                    @if($errors->has('password_comfirm'))
                                        <div class="error-text">
                                            <i class="fa fa-exclamation"></i> {{$errors->first('password_comfirm')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-action">
                                    <div class="actions-log">
                                        <input type="submit" class="button" name="login" value="Xác Nhận">
                                    </div>
                                </div>                                   
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="img-element">
                            <img src="{{ asset('theme_fontend/img/about/about.jpg') }}" alt="banner1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account-details Area end -->
@endsection
