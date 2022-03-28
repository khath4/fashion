@extends('admin::layouts.master')

@section('content')
	<div class="row">
 		<div class="col-lg-12">
 			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}"><i class="fas fa-fw fa-tachometer-alt"></i>Bảng Điều Khiển</a></li>
			    <li class="breadcrumb-item">Bài Viết </li>
			  </ol>
			</nav>
 		</div>
 	</div>
  <div class="row">
    <div class="col-sm-12">
      <form action="" class="form-inline formfill">
        <div class="form-group">
          <input type="text" class="form-control" name="filter" placeholder="Tên bài viết..." value="{{ \Request::get('filter')}}">
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <!-- <select name="cate" id="" class="form-control item-category">
              <option value="">Danh Mục</option>
              @if(isset($categories))
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
                @endforeach
              @endif
            </select> -->
          </div>
        </div>
        <button class="btn btn-primary btn-sx"><i class="fa fa-filter"></i> Filter</button>  
      </form>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lý Bài Viết <a href="{{ route('admin.get.create.article') }}" class="btn btn-success btn-sm float-right">
        <i class="fa fa-plus"></i> Thêm mới</a></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                 <tr>
                    <th>#</th>      
                    <th>Tên Bài Viết</th>
                    <th>Hình Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Hiển Thị</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Tạo</th>
                    <th>Thao Tác</th>
                 </tr>
              </thead>
            <tbody>
               @if(isset($articles))
                 @foreach($articles as $article)
                   <tr>
                      <td>{{ $article->id }}</td>
                      <td>{{ $article->a_name }}</td>
                      <td><img src="{{ asset(pare_url_file($article->a_avatar)) }}" alt="" class="img_pro"></td>
                      <td>{{ $article->a_description }}</td>
                       <td>
                        <a href="{{ route('admin.get.action.article',['hot',$article->id]) }}" class="badge badge-pill {{ $article->getHot($article->a_hot)['class'] }}">{{ $article->getHot($article->a_hot)['name'] }}</a>
                      </td>
                      <td>
                        <a href="{{ route('admin.get.action.article',['active',$article->id]) }}" class="badge badge-pill {{ $article->getStatus($article->a_active)['class'] }}">{{ $article->getStatus($article->a_active)['name'] }}</a>
                      </td>
                      <td>{{ $article->created_at->format('H:i d-m-Y')}}</td>
                      <td>
                        <a class="btn btn-outline-primary btn-sm butt" href="{{ route('admin.get.edit.article', $article->id )}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger btn-sm butt" href="{{ route('admin.get.action.article', ['delete',$article->id]) }}"><i class="fa fa-times"></i></a>
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
