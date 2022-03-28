@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Thương Hiệu</li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Thương Hiệu <a href="{{ route('admin.get.create.brand') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Tên Thương Hiệu</th> 
                    <th>Title Seo</th>
                    <th>Hiện Thị</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($brands))
                 @foreach($brands as $brand)
                   <tr>
                      <td>{{ $brand->id }}</td>
                      <td>{{ $brand->b_name }}</td>
                      <td>{{ $brand->b_title_seo }}</td>
                      <td>
                        <a href="{{ route('admin.get.action.brand',['home',$brand->id]) }}" class="badge badge-pill {{ $brand->getHome($brand->c_home)['class'] }}">{{ $brand->getHome($brand->c_home)['name'] }}</a>
                      </td>
                      <td>
                        <a href="{{ route('admin.get.action.brand',['active',$brand->id]) }}" class="badge badge-pill {{ $brand->getStatus($brand->c_active)['class'] }}">{{ $brand->getStatus($brand->c_active)['name'] }}</a>
                      </td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.brand', $brand->id )}}"><i class="fa fa-edit"></i> Cập Nhật</a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.brand', ['delete',$brand->id]) }}"><i class="fa fa-times"></i> Xóa</a>
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
