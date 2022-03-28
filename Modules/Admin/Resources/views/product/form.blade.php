<form  action="" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="row">
         <div class="col-sm-8">
               <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Tên Sản Phẩm(*)</b></label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Tên sản phẩm" name="pro_name" value="{{ old('pro_name',isset($product->pro_name) ? $product->pro_name : '' )}}">
                        @if($errors->has('pro_name'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('pro_name')}}
                           </div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Mô Tả(*)</b></label>
                     <div class="col-sm-12">
                        <textarea name="pro_description" class="form-control"  rows="3" placeholder="Mô tả ngắn sản phẩm">{{ old('pro_description',isset($product->pro_description) ? $product->pro_description : '' )}}</textarea>
                        @if($errors->has('pro_description'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('pro_description')}}
                           </div>
                        @endif
                     </div>
                  </div>
                   <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Nội Dung(*)</b></label>
                     <div class="col-sm-12">
                        <textarea name="pro_content" class="form-control" rows="5" id="ckcontent" placeholder="Nội dung sản phẩm">{{ old('pro_content',isset($product->pro_content) ? $product->pro_content : '' )}}</textarea>
                        @if($errors->has('pro_content'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('pro_content')}}
                           </div>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Title</b></label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Meta Title" name="pro_title_seo" value="{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '' )}}">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="name" class="col-sm-4 col-form-label"><b class="text-primary">Meta Description</b></label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Meta Description" name="pro_description_seo" value="{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '' )}}">
                     </div>
                  </div>
         </div>
         <div class="col-sm-4">
               <div class="form-group row">
                     <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Loại Sản Phẩm(*)</b></label>
                     <div class="col-sm-12">
                           <select name="pro_category_id" id="" class="form-control item-category">
                              <option value="">Chọn Loại Sản Phẩm</option>
                              @if(isset($categories))
                                 @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
                                 @endforeach
                              @endif
                           </select>
                           @if($errors->has('pro_category_id'))
                              <div class="error-text">
                                 <i class="fas fa-exclamation"></i> {{$errors->first('pro_category_id')}}
                              </div>
                           @endif
                     </div>  
               </div>
               <div class="form-group row">
                     <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Thương Hiệu(*)</b></label>
                     <div class="col-sm-12">
                           <select name="pro_brand_id" id="" class="form-control item-category">
                              <option value="">Chọn Thương Hiệu</option>
                              @if(isset($brands))
                                 @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('pro_brand_id',isset($product->pro_brand_id) ? $product->pro_brand_id : '') == $brand->id ? "selected='selected'" : "" }}>{{ $brand->b_name }}</option>
                                 @endforeach
                              @endif
                           </select>
                           @if($errors->has('pro_brand_id'))
                              <div class="error-text">
                                 <i class="fas fa-exclamation"></i> {{$errors->first('pro_brand_id')}}
                              </div>
                           @endif
                     </div>  
               </div>
               <div class="form-group row">
                     <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Giá Sản Phẩm(*)</b></label>
                     <div class="col-sm-12">
                           <input type="number" name="pro_price" class="form-control" min="0" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '0' )}}">
                           @if($errors->has('pro_price'))
                              <div class="error-text">
                                 <i class="fas fa-exclamation"></i> {{$errors->first('pro_price')}}
                              </div>
                           @endif
                     </div>
               </div>
                     <div class="form-group row">
                     <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Số Lượng Sản Phẩm(*)</b></label>
                     <div class="col-sm-12">
                           <input type="number" name="pro_qty" class="form-control" min="0" value="{{ old('pro_qty',isset($product->pro_qty) ? $product->pro_qty : '0' )}}">
                           @if($errors->has('pro_qty'))
                              <div class="error-text">
                                 <i class="fas fa-exclamation"></i> {{$errors->first('pro_qty')}}
                              </div>
                           @endif
                     </div>
               </div>
               <div class="form-group row">
                     <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Khuyến Mãi %</b></label>
                     <div class="col-sm-12">
                           <input type="number" name="pro_sale" class="form-control" min="0" max="100" value="{{ old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '0' )}}">
                     </div>
               </div>
               
               <div class="form-group row">
                     <label for="name" class="col-sm-6 col-form-label"><b class="text-primary">Hình Ảnh(*)</b></label>
                     <div class="col-sm-12">
                           <input type="file" name="pro_avatar" class="form-control" id="input_img" accept="image/png, .jpeg, .jpg">
                           @if($errors->has('pro_avatar'))
                           <div class="error-text">
                              <i class="fas fa-exclamation"></i> {{$errors->first('pro_avatar')}}
                           </div>
                        @endif
                     </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-12">
                     <img src="{{ isset($product->pro_avatar) ? asset(pare_url_file($product->pro_avatar)) : asset('images/default.png') }}" alt="" class="img_fault" id="output_img"  >
                  </div>
               </div>
         </div>
   </div>
   <div class="form-group">
      <a href="{{ route('admin.get.list.product') }}" class="btn btn-primary btn-sm"><i class="fa fa-angle-double-left"></i></a>
      <button type="submit" class="btn btn-primary btn-sm">Lưu Thông Tin</button>
   </div>
</form>
<script>
   CKEDITOR.replace( 'ckcontent' );
</script>
