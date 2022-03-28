@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Page Statics </li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Page Statics <a href="{{ route('admin.get.create.page_statics') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Tiêu Đề</th>
                    <th>Ngày Tạo</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($page_statics))
                 @foreach($page_statics as $page_static)
                   <tr>
                      	<td>{{ $page_static->id }}</td>
                      	<td>{{ $page_static->ps_name }}</td>
                     	  <td>{{ $page_static->created_at->format('H:i d-m-Y')}}</td>
                      	<td>
                        	<a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.page_statics', $page_static->id )}}"><i class="fa fa-edit"></i></a>
                        	<a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.page_statics', ['delete',$page_static->id]) }}"><i class="fa fa-times"></i></a>
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
