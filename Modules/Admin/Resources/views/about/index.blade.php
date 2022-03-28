@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">About</li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý About </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                 	<tr>
	                    <th>#</th>
	                    <th>Email</th> 
	                    <th>Điện Thoại</th>
	                    <th>Địa Chỉ</th>
	                    <th>Time Open - Close</th>
	                    <th>Mô Tả Ngắn</th>
	                    <th>#</th>
                 	</tr>
              	</thead>
            <tbody>
               @if(isset($abouts))
                 @foreach($abouts as $about)
                   <tr>
                     	<td>{{ $about->id }}</td>
                      	<td>{{ $about->a_email }}</td>
                      	<td>{{ $about->a_phone }}</td>
                 		<td>{{ $about->a_address }}</td>
                 		<td>{{ $about->time_open }}</td>
                 		<td>{{ $about->a_description }}</td>
                      	<td>
                        	<a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.about', $about->id )}}"><i class="fa fa-edit"></i> Cập Nhật</a>
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
