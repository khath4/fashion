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
                                <li class="category3"><span>Quên mật khẩu</span></li>
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
                                    <h2>Quên Mật Khẩu</h2>
                                    <p class="form-row form-row-wide">
                                        <label for="username"> Nhập Email <span class="required">*</span></label>
                                        <input type="email" class="input-text" name="email" id="username" value="{{ old('email') }}" required>
                                    </p>
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

@endsection
