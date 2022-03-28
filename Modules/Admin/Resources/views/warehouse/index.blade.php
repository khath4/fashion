@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Sản Phẩm</li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="row">
    <div class="col-sm-12">
      <form action="" class="form-inline formfill">
        <div class="form-group">
          <input type="text" class="form-control" name="filter" placeholder="Tên sản phẩm..." value="{{ \Request::get('filter')}}">
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <select name="cate" id="" class="form-control item-category">
              <option value="">Danh Mục</option>
              @if(isset($categories))
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
                @endforeach
              @endif
            </select>
          </div>
        </div>
        <button class="btn btn-primary btn-sx"><i class="fa fa-filter"></i> Filter</button>  
      </form>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Kho
        	<a href="?type=inventory-50" class="btn btn-warning btn-sm margin-custom"><i class="fa fa-boxes"></i> Tồn Kho Hơn 50 SP</a> 
        	<a href="?type=inventory-100-30" class="btn btn-warning btn-sm margin-custom"><i class="fa fa-boxes"></i> Tồn Kho Hơn 100 SP & > 30 Ngày (Cập Nhật)</a> 
        	<a href="?type=payDay" class="btn btn-danger btn-sm margin-custom"><i class="fa fa-sort-amount-up-alt"></i> Bán Chạy Trong Ngày</a>
        	<a href="?type=payMonth" class="btn btn-danger btn-sm margin-custom"><i class="fa fa-sort-amount-up-alt"></i> Bán Chạy Trong Tháng</a>
        	<a href="?type=payYear" class="btn btn-danger btn-sm margin-custom"><i class="fa fa-sort-amount-up-alt"></i> Bán Chạy Trong Năm</a>
    </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Thông Tin Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Danh Mục</th>
                    <th>Trạng Thái</th>
                    <th>HOT</th>
                    <!-- <th>Thao Tác</th> -->
                 </tr>
              </thead>
            <tbody>

               @if(isset($products))
                 @foreach($products as $product)
                  <?php 
                    $total = 0;
                    if($product->pro_total_ratings > 0){
                      $total = round($product->pro_total_number / $product->pro_total_ratings , 2);
                    }
                  ?>
                   <tr>
                      <td>{{ $product->id }}</td>
                      <td>
                        {{ $product->pro_name }}
                        <ul class="showif">
                          <li><span><i class="fa fa-dollar-sign"></i>
                            @if($product->pro_sale > 0)
                            <del>{{ number_format($product->pro_price,0,',','.') }} VND - </del>
                            @endif 
                            {{ format_price($product->pro_price,$product->pro_sale) }} </span>
                          </li>
                          <li><span><i class="fa fa-percentage"></i> Sale: {{ $product->pro_sale }} %</span></li>
                          <li><span><i class="fa fa-sort-numeric-up"></i> Số Lượng :{{ $product->pro_qty }}</span></li>
                          <li><span><i class="fa fa-sort-numeric-up"></i> Số Lượng Đã Bán :{{ $product->pro_pay }}</span></li>
                          <li><span>Đánh Giá :</span>
                              <span class="ratings">
                                @for($i=1 ;$i<= 5 ;$i++ )
                                  <i class="fa fa-star {{ $i <= $total ? 'active' : ''}}"></i>
                                @endfor
                                {{ $total }}
                              </span>
                          </li>
                        </ul>
                      </td>
                      <td><img src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" class="img_pro"></td>
                      <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N\A]' }}</td>
                      <td>
                        <a href="{{ route('admin.get.action.product',['active',$product->id]) }}" class="badge badge-pill {{ $product->getStatus($product->pro_active)['class'] }}">{{ $product->getStatus($product->pro_active)['name'] }}</a>
                      </td>
                      <td>
                        <a href="{{ route('admin.get.action.product',['hot',$product->id]) }}" class="badge badge-pill {{ $product->getHot($product->pro_hot)['class'] }}">{{ $product->getHot($product->pro_hot)['name'] }}</a>
                      </td>
                      <!-- <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.product', $product->id )}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.product', ['delete',$product->id]) }}"><i class="fa fa-times"></i></a>
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
