@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Liên Hệ</li>
			    
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Liên Hệ </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                 	<tr>
                    	<th>#</th>
                    	<th>Tiêu Đề</th>
                    	<th>Họ Tên</th>
                    	<th>Điện Thoại</th>
                    	<th>Email</th>
                    	<th>Nội Dung</th>
                    	<th>Trạng Thái</th>
                    	
                 	</tr>
              	</thead>
            <tbody>
               @if(isset($contacts))
                 @foreach($contacts as $contact)
                   <tr>
                      	<td>{{ $contact->id }}</td>
                      	<td>{{ $contact->ct_title }}</td>
                      	<td>{{ $contact->ct_name }}</td>
                      	<td>{{ $contact->ct_phone }}</td>
                      	<td>{{ $contact->ct_email }}</td>
                      	<td>{{ $contact->ct_content }}</td>
                      	<td>
                      		<a href="{{ route('admin.get.action.contact',['status',$contact->id]) }}" class="badge badge-pill {{ $contact->getStatus($contact->ct_status)['class'] }}">{{ $contact->getStatus($contact->ct_status)['name'] }}</a>
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

