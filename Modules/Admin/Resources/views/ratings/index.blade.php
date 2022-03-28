@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href=""><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Đánh Giá</li>
			    
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Đánh Giá </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>Tên TV</th>
                    <th>Sản Phẩm</th>                 
                    <th>Ratings</th>
                    <th>Nội Dung</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($ratings))
                 @foreach($ratings as $rating)
                   <tr>
                      <td>{{ $rating->id }}</td>
                      <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                      <td><a href="{{ route('get.detail.product',[$rating->product->pro_slug,$rating->product->id]) }}">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a></td>
                      <td>
                      	<span class="ratings">
                            @for($i=1 ;$i<= $rating->rt_number ;$i++ )
                                <i class="fa fa-star active"></i>
                           	@endfor
                        </span>
                      </td>
                      <td>{{ $rating->rt_content }}</td>
                      <td>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.category', ['delete',$rating->id]) }}"><i class="fa fa-times"></i> Xóa</a>
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
