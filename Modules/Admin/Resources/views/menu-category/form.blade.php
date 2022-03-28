<form  action="" method="POST">
   @csrf
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Tên Menu(*)</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Tên menu danh mục" name="mc_name" value="{{ old('mc_name',isset($categoryMenu->mc_name) ? $categoryMenu->mc_name : '' )}}">
         @if($errors->has('mc_name'))
         <div class="error-text">
            <i class="fas fa-exclamation"></i> {{$errors->first('mc_name')}}
         </div>
         @endif
      </div>
   </div>
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Title</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Meta Title" name="mc_title_seo" value="{{ old('mc_title_seo',isset($categoryMenu->mc_title_seo) ? $categoryMenu->mc_title_seo : '' )}}">
      </div>
   </div>
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Description</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Meta Description" name="mc_description_seo" value="{{ old('mc_description_seo',isset($categoryMenu->mc_description_seo) ? $categoryMenu->mc_description_seo : '' )}}">
      </div>
   </div>
   <div class="form-group">
      <a href="{{ route('admin.get.list.menu-category') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
   </div>
</form>