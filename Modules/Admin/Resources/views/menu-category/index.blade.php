@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Danh Mục Cha</li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Danh Mục Cha <a href="{{ route('admin.get.create.menu-category') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Tên Danh Mục Cha</th>  
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($menu_categories))
                 @foreach($menu_categories as $category)
                   <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->mc_name }}</td>
                      <td>
                        <a href="{{ route('admin.get.action.menu-category',['status',$category->id]) }}" class="badge badge-pill {{ $category->getStatus($category->mc_status)['class'] }}">{{ $category->getStatus($category->mc_status)['name'] }}</a>
                      </td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.menu-category', $category->id )}}"><i class="fa fa-edit"></i> Cập Nhật</a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.menu-category', ['delete',$category->id]) }}"><i class="fa fa-times"></i> Xóa</a>
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
