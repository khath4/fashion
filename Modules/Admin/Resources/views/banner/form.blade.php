<form  action="" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
            <div class="col-sm-8">
               <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Chọn Loại(*)</b></label>
                  <div class="col-sm-12">
                     <select name="banner_type" id="" class="form-control">
                        @if(isset($banner->banner_type))
                           <option value="{{ $banner->banner_type }}">
                              @if($banner->banner_type == 1)
                                 Footer
                              @elseif($banner->banner_type == 2)
                                 Login
                              @elseif($banner->banner_type == 3)
                                 Register
                              @elseif($banner->banner_type == 5)
                                 Category
                              @else
                                 Banner
                              @endif
                           </option>
                        @endif
                        <option value="1">Footer</option>
                        <option value="2">Login</option>
                        <option value="3">Register</option>
                        <option value="4">Banner</option>
                        <option value="5">Cateogry</option>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Liên Kết</b></label>
                  <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Link liên kết" name="banner_link" value="{{ old('banner_link',isset($banner->banner_link) ? $banner->banner_link : '' )}}">
                  </div>
               </div>
            <div class="form-group row">
               <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Image(*)</b></label>
                  <div class="col-sm-12">
                        <input type="file" name="banner_avatar" class="form-control" id="input_img" accept="image/png, .jpeg, .jpg"> <!-- {{ isset($slider->s_avatar) ? '' : "required" }} -->
                        @if($errors->has('banner_avatar'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('banner_avatar')}}
                           </div>
                        @endif
                  </div>
            </div>  
            </div>
            <div class="col-sm-4">
               <div class="form-group row">
                     <div class="col-sm-12">
                        <img src="{{ isset($banner->banner_avatar) ? asset(pare_url_file($banner->banner_avatar)) : asset('images/default.png') }}" alt="" class="img_fault" id="output_img">
                     </div>
               </div>
            </div>
   </div>
   <div class="form-group">
      <a href="{{ route('admin.get.list.banner') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
   </div>
</form>