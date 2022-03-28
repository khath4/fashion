<form  action="" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
      <div class="col-sm-12">
         <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Tiêu Đề(*)</b></label>
            <div class="col-sm-12">
               <input type="text" class="form-control" placeholder="Tiêu đề trang" name="ps_name" value="{{ old('ps_name',isset($page_static->ps_name) ? $page_static->ps_name : '' )}}">
               @if($errors->has('ps_name'))
               <div class="error-text">
                  <i class="fas fa-exclamation"></i> {{$errors->first('ps_name')}}
               </div>
               @endif
            </div>
         </div>
         <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Chọn Trang(*)</b></label>
            <div class="col-sm-12">
               <select name="ps_type" id="" class="form-control">
                  @if(isset($page_static->ps_type))
                     <option value="{{ $page_static->ps_type }}">
                        @if($page_static->ps_type == 1)
                           Về chúng tôi
                        @elseif($page_static->ps_type == 2)
                           Thông tin giao hàng
                        @elseif($page_static->ps_type == 3)
                           Chính sách bảo mật
                        @else
                           Điều khoản sử dụng
                        @endif
                     </option>
                  @endif
                  <option value="1">Về chúng tôi</option>
                  <option value="2">Thông tin giao hàng</option>
                  <option value="3">Chính sách bảo mật</option>
                  <option value="4">Điều khoản sử dụng</option>
               </select>
            </div>
         </div>
         <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Nội Dung(*)</b></label>
               <div class="col-sm-12">
                  <textarea name="ps_content" class="form-control" rows="5" id="ckcontent" placeholder="Nội dung bài viết">{{ old('ps_content',isset($page_static->ps_content) ? $page_static->ps_content : '' )}}</textarea>
                  @if($errors->has('ps_content'))
                  <div class="error-text">
                     <i class="fas fa-exclamation"></i> {{$errors->first('ps_content')}}
                  </div>
                  @endif
            </div>
         </div>
      </div>
   </div>
   <div class="form-group">
      <a href="{{ route('admin.get.list.article') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
   </div>
</form>
<script>
   CKEDITOR.replace( 'ckcontent' );
</script>
