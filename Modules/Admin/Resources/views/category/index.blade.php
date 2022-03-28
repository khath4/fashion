@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Danh Mục</li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Danh Mục <a href="{{ route('admin.get.create.category') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Danh Mục Cha</th>
                    <th>Tên Danh Mục</th>  
                    <th>Hiện Thị</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($categories))
                 @foreach($categories as $category)
                   <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ isset($category->MenuCategory->mc_name) ? $category->MenuCategory->mc_name : '[N\A]' }}</td>
                      <td>{{ $category->c_name }}</td>
                      <td>
                        <a href="{{ route('admin.get.action.category',['home',$category->id]) }}" class="badge badge-pill {{ $category->getHome($category->c_home)['class'] }}">{{ $category->getHome($category->c_home)['name'] }}</a>
                      </td>
                      <td>
                        <a href="{{ route('admin.get.action.category',['active',$category->id]) }}" class="badge badge-pill {{ $category->getStatus($category->c_active)['class'] }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
                      </td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.category', $category->id )}}"><i class="fa fa-edit"></i> Cập Nhật</a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.category', ['delete',$category->id]) }}"><i class="fa fa-times"></i> Xóa</a>
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
