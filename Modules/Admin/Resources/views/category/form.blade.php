<form  action="" method="POST">
   @csrf
   <div class="form-group row">
      <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Menu(*)</b></label>
      <div class="col-sm-12">
            <select name="c_menu_category_id" id="" class="form-control item-category">
               <option value="">Chọn Danh Mục Cha</option>
               @if(isset($menus))
                  @foreach($menus as $menu)
                     <option value="{{ $menu->id }}" {{ old('c_menu_category_id',isset($category->c_menu_category_id) ? $category->c_menu_category_id : '') == $menu->id ? "selected='selected'" : "" }}>{{ $menu->mc_name }}</option>
                  @endforeach
               @endif
            </select>
            @if($errors->has('c_menu_category_id'))
               <div class="error-text">
                  <i class="fas fa-exclamation"></i> {{$errors->first('c_menu_category_id')}}
               </div>
            @endif
      </div>  
   </div>
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Tên Danh Mục(*)</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Tên danh mục" name="c_name" value="{{ old('c_name',isset($category->c_name) ? $category->c_name : '' )}}">
         @if($errors->has('c_name'))
         <div class="error-text">
            <i class="fas fa-exclamation"></i> {{$errors->first('c_name')}}
         </div>
         @endif
      </div>
   </div>
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Title</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Meta Title" name="c_title_seo" value="{{ old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '' )}}">
      </div>
   </div>
   <div class="form-group row">
      <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Description</b></label>
      <div class="col-sm-12">
         <input type="text" class="form-control" placeholder="Meta Description" name="c_description_seo" value="{{ old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '' )}}">
      </div>
   </div>
   <div class="form-group">
      <a href="{{ route('admin.get.list.category') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
   </div>
</form>