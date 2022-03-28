@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Slider </li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Slider <a href="{{ route('admin.get.create.slider') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Tiêu Đề</th>
                    <th>Hình Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Liên Kết</th>
                    <th>Hiển Thị</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($sliders))
                 @foreach($sliders as $slider)
                   <tr>
                      <td>{{ $slider->id }}</td>
                      <td>{{ $slider->s_title }}</td>
                      <td><img src="{{ asset(pare_url_file($slider->s_avatar)) }}" alt="" class="img_pro2"></td>
                      <td>{{ $slider->s_description }}</td>
                      <td>{{ isset($slider->s_link) ? $slider->s_link : "[N\A]" }}</td>
                      <td>
                        <a href="{{ route('admin.get.action.slider',['active',$slider->id]) }}" class="badge badge-pill {{ $slider->getStatus($slider->s_status)['class'] }}">{{ $slider->getStatus($slider->s_status)['name'] }}</a>
                      </td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.slider', $slider->id )}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.slider', ['delete',$slider->id]) }}"><i class="fa fa-times"></i></a>
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
