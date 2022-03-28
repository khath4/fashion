<form  action="" method="POST">
   @csrf
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Tên Thương Hiệu(*)</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Tên thương hiệu" name="b_name" value="{{ old('b_name',isset($brand->b_name) ? $brand->b_name : '' )}}">
         @if($errors->has('b_name'))
         <div class="error-text">
            <i class="fas fa-exclamation"></i> {{$errors->first('b_name')}}
         </div>
         @endif
      </div>
   </div>
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Title</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Meta Title" name="b_title_seo" value="{{ old('b_title_seo',isset($brand->b_title_seo) ? $brand->b_title_seo : '' )}}">
      </div>
   </div>
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Description</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Meta Description" name="b_description_seo" value="{{ old('b_description_seo',isset($brand->b_description_seo) ? $brand->b_description_seo : '' )}}">
      </div>
   </div>
   <div class="form-group">
      <a href="{{ route('admin.get.list.brand') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
   </div>
</form>