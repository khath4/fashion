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
        <div class="form-group form_input">
          <input type="text" class="form-control" name="filter" placeholder="Tên sản phẩm..." value="{{ \Request::get('filter')}}">
        </div>
        <div class="form-group form_input">
            <select name="cate" id="" class="form-control item-category">
              <option value="">Danh mục</option>
              @if(isset($categories))
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
                @endforeach
              @endif
            </select>
        </div>
        <div class="form-group form_input">
            <select name="brand" id="" class="form-control item-category">
              <option value="">Thương hiệu</option>
              @if(isset($brands))
                @foreach($brands as $brands)
                  <option value="{{ $brands->id }}" {{ \Request::get('brand') == $brands->id ? "selected='selected'" : "" }}>{{ $brands->b_name }}</option>
                @endforeach
              @endif
            </select> 
        </div>
        <div class="form-group form_input">
          <button class="btn btn-primary btn-sx"><i class="fa fa-filter"></i> Filter</button>  
        </div>
      </form>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Sản Phẩm <a href="{{ route('admin.get.create.product') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>     
                    <th>Danh Mục</th> 
                    <th>Thương Hiệu</th>
                    <th>Thông Tin Sản Phẩm</th>
                    <th>Hình Ảnh</th>  
                    <th>Trạng Thái</th>
                    <th>HOT</th>
                    <th>Thao Tác</th>
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
                      <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N\A]' }}</td>
                      <td>{{ isset($product->brand->b_name) ? $product->brand->b_name : '[N\A]' }}</td>
                      <td>
                        {{ $product->pro_name }}
                        <ul class="showif">
                          <li><span><i class="fa fa-dollar-sign"></i>
                            @if($product->pro_sale > 0)
                            <del>{{ number_format($product->pro_price,0,',','.') }} VND</del> -
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
                      <td>
                        <a href="{{ route('admin.get.action.product',['active',$product->id]) }}" class="badge badge-pill {{ $product->getStatus($product->pro_active)['class'] }}">{{ $product->getStatus($product->pro_active)['name'] }}</a>
                      </td>
                      <td>
                        <a href="{{ route('admin.get.action.product',['hot',$product->id]) }}" class="badge badge-pill {{ $product->getHot($product->pro_hot)['class'] }}">{{ $product->getHot($product->pro_hot)['name'] }}</a>
                      </td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.product', $product->id )}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.product', ['delete',$product->id]) }}"><i class="fa fa-times"></i></a>
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
