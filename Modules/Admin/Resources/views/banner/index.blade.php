@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Banner & Footer </li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Banner & Footer <a href="{{ route('admin.get.create.banner') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Loại</th>
                    <th>Hình Ảnh</th>
                    <th>Liên Kết</th>
                    <th>Hiển Thị</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($banners))
                 @foreach($banners as $banner)
                   <tr>
                      <td>{{ $banner->id }}</td>
                      @if(isset($banner->banner_type))
                          @if($banner->banner_type == 1)
                              <td>Footer</td>
                          @elseif($banner->banner_type == 2)
                              <td>Login</td>
                          @elseif($banner->banner_type == 3)
                              <td>Register</td>
                          @elseif($banner->banner_type == 5)
                              <td>Category</td>
                          @else
                              <td>Banner</td>
                          @endif
                      @endif
                      <td><img src="{{ asset(pare_url_file($banner->banner_avatar)) }}" alt="" class="img_pro2"></td>

                      <td>{{ isset($banner->banner_link) ? $banner->banner_link : "[N\A]" }}</td>
                      <td>
                        <a href="{{ route('admin.get.action.banner',['active',$banner->id]) }}" class="badge badge-pill {{ $banner->getStatus($banner->banner_status)['class'] }}">{{ $banner->getStatus($banner->banner_status)['name'] }}</a>
                      </td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.banner', $banner->id )}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.banner', ['delete',$banner->id]) }}"><i class="fa fa-times"></i></a>
                      </td>
                   </tr>
                 @endforeach
               @endif
              </tbody>
          </table>
        </div>
    </div>
</div>
@stop        
