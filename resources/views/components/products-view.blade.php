        @if(isset($products))
        <!-- product section start -->
        <div class="our-product-area new-product">
            <div class="container">
                <div class="area-title">
                    <h2>Sản Phẩm Vừa Xem</h2>
                </div>
                <!-- our-product area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="features-curosel">
                                @foreach($products as $product)
                                <!-- single-product start -->
                                <div class="col-lg-3 col-md-3">
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            @if($product->pro_qty == 0)
                                                <span class="qty_cus">Tạm hết hàng</span>
                                            @endif
                                            @if($product->pro_sale > 0)
                                                <span class="sale_cus">Đã giảm {{ $product->pro_sale}}%</span>
                                            @endif
                                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                               <img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
                                                <img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" />
                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="{{ route('add.shopping.cart',$product->id) }}" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                                                        </div>                                  
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price">{{ format_price($product->pro_price,$product->pro_sale) }}</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <?php 
                                                $totalDetail = 0;
                                                if($product->pro_total_ratings > 0)
                                                {
                                                    $totalDetail = round($product->pro_total_number / $product->pro_total_ratings , 2);
                                                }
                                            ?>                                                     
                                            <div class="cat-rating text-center">
                                                @for($i = 1; $i <= 5 ; $i++)
                                                    <a><i class="fa fa-star {{ $i <= $totalDetail ? 'active' : ''}}"></i></a>
                                                @endfor
                                            </div>
                                            <h2 class="product-name"><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h2>
                                            <!-- <p>{{ $product->pro_description }}</p> -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            <!-- single-product end -->
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- our-product area end -->   
            </div>
        </div>
        <!-- product section end -->
        @endif