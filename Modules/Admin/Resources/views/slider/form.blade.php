<form  action="" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
         <div class="col-sm-12">
               <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Tiêu Đề(*)</b></label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Tiêu đề slider" name="s_title" value="{{ old('s_title',isset($slider->s_title) ? $slider->s_title : '' )}}">
                        @if($errors->has('s_title'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('s_title')}}
                           </div>
                        @endif
                     </div>
                  </div>
            </div>
            <div class="col-sm-8">
               <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Mô Tả</b></label>
                     <div class="col-sm-12">
                        <textarea name="s_description" class="form-control" placeholder="Mô tả ngắn bài viết">{{ old('s_description',isset($slider->s_description) ? $slider->s_description : '' )}}</textarea>
                        @if($errors->has('s_description'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('s_description')}}
                           </div>
                        @endif
                     </div>
                  </div>
               <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Liên Kết</b></label>
                  <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Link liên kết" name="s_link" value="{{ old('s_link',isset($slider->s_link) ? $slider->s_link : '' )}}">
                  </div>
               </div>
            <div class="form-group row">
               <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Slider(*)</b></label>
                  <div class="col-sm-12">
                        <input type="file" name="s_avatar" class="form-control" id="input_img" accept="image/png, .jpeg, .jpg"> <!-- {{ isset($slider->s_avatar) ? '' : "required" }} -->
                        @if($errors->has('s_avatar'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('s_avatar')}}
                           </div>
                        @endif
                     </div>
               </div>  
            </div>

            <div class="col-sm-4">
               <div class="form-group row">
                     <div class="col-sm-12">
                        <img src="{{ isset($slider->s_avatar) ? asset(pare_url_file($slider->s_avatar)) : asset('images/default.png') }}" alt="" class="img_fault" id="output_img">
                     </div>
               </div>
            </div>
   </div>
   <div class="form-group">
      <a href="{{ route('admin.get.list.slider') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
   </div>
</form>