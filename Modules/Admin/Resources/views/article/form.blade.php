<form  action="" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
         <div class="col-sm-12">
               <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Tên Bài Viết(*)</b></label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Tên bài viết" name="a_name" value="{{ old('a_name',isset($article->a_name) ? $article->a_name : '' )}}">
                        @if($errors->has('a_name'))
                        <div class="error-text">
                           <i class="fas fa-exclamation"></i> {{$errors->first('a_name')}}
                        </div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Mô Tả(*)</b></label>
                     <div class="col-sm-12">
                        <textarea name="a_description" class="form-control" placeholder="Mô tả ngắn bài viết">{{ old('a_description',isset($article->a_description) ? $article->a_description : '' )}}</textarea>
                        @if($errors->has('a_description'))
                        <div class="error-text">
                           <i class="fas fa-exclamation"></i> {{$errors->first('a_description')}}
                        </div>
                     @endif
                     </div>
                  </div>
                   <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Nội Dung(*)</b></label>
                     <div class="col-sm-12">
                        <textarea name="a_content" class="form-control" rows="5" id="ckcontent" placeholder="Nội dung bài viết">{{ old('a_content',isset($article->a_content) ? $article->a_content : '' )}}</textarea>
                        @if($errors->has('a_content'))
                        <div class="error-text">
                           <i class="fas fa-exclamation"></i> {{$errors->first('a_content')}}
                        </div>
                        @endif
                     </div>
                  </div>
            </div>
            <div class="col-sm-8">
               <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Title</b></label>
                  <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Meta Title" name="a_title_seo" value="{{ old('pro_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '' )}}">
                  </div>
               </div>
                  <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Description</b></label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Meta Description" name="a_description_seo" value="{{ old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '' )}}">
                     </div>
                  </div>
            <div class="form-group row">
               <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Hình Ảnh(*)</b></label>
                  <div class="col-sm-12">
                        <input type="file" name="a_avatar" class="form-control" id="input_img" accept="image/png, .jpeg, .jpg">
                        @if($errors->has('a_avatar'))
                        <div class="error-text">
                           <i class="fas fa-exclamation"></i> {{$errors->first('a_avatar')}}
                        </div>
                        @endif
                     </div>
               </div>  
            </div>
            <div class="col-sm-4">
               <div class="form-group row">
                     <div class="col-sm-12">
                        <img src="{{ isset($article->a_avatar) ? asset(pare_url_file($article->a_avatar)) : asset('images/default.png') }}" alt="" class="img_fault" id="output_img">
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
