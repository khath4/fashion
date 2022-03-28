@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Thành Viên</li>
			    
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Thành Viên <a href="{{ route('admin.get.list.user') }}" class="btn btn-success btn-sm pull-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Họ Và Tên</th>                 
                    <th>Email</th>
                    <th>Điện Thoại</th>
                    <td>Trạng Thái</td>
                   <!--  <th>Thao Tác</th> -->
                 </tr>
              </thead>
            <tbody>
               @if(isset($users))
                 @foreach($users as $user)
                   <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>
                        @if($user->active == 1)
                          <a href="{{ route('admin.get.action.user',['active',$user->id]) }}" class="badge badge-pill badge-success">Active</a>
                        @else
                          <a href="{{ route('admin.get.action.user',['active',$user->id]) }}" class="badge badge-pill badge-danger">Block</a>
                        @endif
                      </td>
                      <!-- <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.category', $user->id )}}"><i class="fa fa-edit"></i> Cập Nhật</a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.category', ['delete',$user->id]) }}"><i class="fa fa-times"></i> Xóa</a>
                      </td> -->
                   </tr>
                 @endforeach
               @endif
              </tbody>
          </table>
        </div>
    </div>
</div>
@stop        
