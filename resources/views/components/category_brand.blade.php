							
							<aside class="sidebar-content">
								<div class="sidebar-title">
									<h6>Trạng Thái</h6>
								</div>
								<ul>
									<li><a class="{{ Request::get('status') == 1 ? 'active_check_qty' : ''}}" href="{{ request()->fullUrlWithQuery(['status' => 1]) }}">Còn Hàng</a><span></span></li>
									<li><a class="{{ Request::get('status') == 2 ? 'active_check_qty' : ''}}" href="{{ request()->fullUrlWithQuery(['status' => 2]) }}">Hết hàng</a><span></span></li>
								</ul>
							</aside>
							
							<aside class="topbarr-category sidebar-content">
								<div class="tpbr-title sidebar-title col-md-12 nopadding">
									<h6>Lọc theo giá</h6>
								</div>
								<div class="tpbr-menu col-md-12 nopadding">
									<!-- shop-filter start -->
									<div class="price-bar">
										<div class="info_widget">
											<form action="">
											<div class="price_filter">
												<div id="slider-range"></div>
												<div class="price_slider_amount">
													<input type="submit" class="filter-price" value="Filter"/>
													<div class="filter-ranger">
														<h6>Giá:</h6>
														<p>
														<input type="text" id="amount_start" name="price" readonly="" />
														<input type="text" id="amount_end" name="price" readonly="" />
														</p>
														<input type="hidden" id="start_price" name="start_price" value="{{ $start }}">
														<input type="hidden" id="end_price" name="end_price" value="{{ $end }}">
														<button type="submit" class="checkfilter">Lọc giá </button>
													</div>
												</div>
											</div>
											</form>
										</div>
									</div>
									<!-- shop-filter end -->
								</div>
							</aside>		
							<aside class="widge-topbar">
								<div class="bar-title">
									<div class="bar-ping"><img src="{{ asset('theme_fontend/img/bar-ping.png') }}" alt=""></div>
									<h2>Tags</h2>
								</div>
								<div class="exp-tags">
									<div class="tags">
										<a href="#">camera</a>
										<a href="#">mobile</a>
										<a href="#">electronic</a>
										<a href="#">destop</a>
										<a href="#">tablet</a>
										<a href="#">accessories</a>
										<a href="#">camcorder</a>
										<a href="#">laptop</a>
									</div>
								</div>
							</aside>
						</div>
					</div>
					<!-- left sidebar end -->
					<!-- right sidebar start -->
					<div class="col-md-9 col-sm-12 col-xs-12">
						<!-- shop toolbar start -->
						<div class="shop-content-area">
							<div class="shop-toolbar">
								<div class="col-md-6 col-sm-6 col-xs-12 nopadding-left text-left">
									<form class="tree-most" id="form_order" method="get">
										<div class="orderby-wrapper">
											<label>Sắp xếp</label>
											<select name="orderby" class="orderby ">
												<option {{ Request::get('orderby') == "md" || !Request::get('orderby') ? "selected='selected'" : ""}} value="md" selected="selected">Mặc định</option>
												<option {{ Request::get('orderby') == "price_pay" ? "selected='selected'" : ""}} value="price_pay">Mua nhiều</option>
												<option {{ Request::get('orderby') == "desc" ? "selected='selected'" : ""}} value="desc">Sản phẩm mới nhất</option>
												<option {{ Request::get('orderby') == "asc" ? "selected='selected'" : ""}} value="asc">Sản phẩm cũ nhất</option>
												<option {{ Request::get('orderby') == "price_max" ? "selected='selected'" : ""}} value="price_max">Giá tăng dần</option>
												<option {{ Request::get('orderby') == "price_min" ? "selected='selected'" : ""}} value="price_min">Giá giảm dần</option>
											</select>
										</div>
									</form>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 nopadding-right text-center">
									<div class="view-mode">
										<label>View on</label>
										<ul>
											<li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>
											<li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- shop toolbar end -->
						<!-- product-row start -->
						<div class="tab-content">
							<div class="tab-pane fade in active" id="shop-grid-tab">
								<div class="row">
									<div class="shop-product-tab first-sale">
									@if(isset($products))	
										@foreach($products as $product)
										<div class="col-lg-4 col-md-4 col-sm-4">
											<div class="two-product">
												<!-- single-product start -->
												<div class="single-product first-sale2">
													<div class="product-img">
														@if($product->pro_qty == 0)
                                                            <span class="qty_cus">Tạm hết hàng</span>
                                                        @endif
                                                        @if($product->pro_sale > 0)
                                                            <span class="sale_cus">Đã giảm {{ $product->pro_sale}}%</span>
                                                        @endif
														<a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
															<img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar))}}" alt="" />
															<img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar))}}" alt="" />
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
																		<a href="{{ route('add.shopping.cart',$product->id) }}" title="Thêm Vào Giỏ Hàng"><i class="fa fa-shopping-cart"></i></a>
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
														<h2 class="product-name"><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name}}</a></h2>
														
													</div>
												</div>
												<!-- single-product end -->
											</div>
										</div>
										@endforeach
									@endif
									</div>
								</div>
						
							</div>
							<!-- list view -->
							<div class="tab-pane fade" id="shop-list-tab">
								<div class="list-view">
								@if(isset($products))	
									@foreach($products as $product)
									<!-- single-product start -->
									<?php 
					                    $totalDetail = 0;
					                    if($product->pro_total_ratings > 0)
					                    {
					                      	$totalDetail = round($product->pro_total_number / $product->pro_total_ratings , 2);
					                    }
					                ?>
									<div class="product-list-wrapper">
										<div class="single-product">								
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="product-img">
													<a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
														<img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar))}}" alt="" />
														<img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar))}}" alt="" />
													</a>
												</div>								
											</div>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<div class="product-content">
													<h2 class="product-name2"><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name}}</a></h2>
													<div class="rating-price">	
														<div class="pro-rating">
															@for($i = 1; $i <= 5 ; $i++)
																<a href="#"><i class="fa fa-star {{ $i <= $totalDetail ? 'active' : ''}}"></i></a>
															@endfor
														</div>
														<div class="price-boxes">
															<span class="new-price">{{ format_price($product->pro_price,$product->pro_sale) }}</span>
														</div>
														@if($product->pro_sale > 0)
															<span class="sale-price"><del>{{ number_format($product->pro_price,0,',','.') }} VND</del></span>
															<b>- {{ $product->pro_sale }} %</b>
														@endif
													</div>
													<div class="actions-e">
														<div class="action-buttons">
															<div class="add-to-cart">
																<a href="{{ route('add.shopping.cart',$product->id) }}">Thêm Vào Giỏ Hàng</a>
															</div>
															<div class="add-to-links">
																<div class="add-to-wishlist">
																	<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
																</div>
																<div class="compare-button">
																	<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
																</div>									
															</div>
														</div>
													</div>										
												</div>									
											</div>
										</div>
									</div>
									<!-- single-product end -->	
									@endforeach
								@endif
								</div>
							</div>
							<!-- shop toolbar start -->
							<div class="shop-content-bottom">
								<div class="shop-toolbar btn-tlbr">
									<div class="col-xs-12 text-center">
										{{ $products->appends(request()->query())->links('vendor.pagination.custom') }}
									</div>
								</div>
							</div>
							<!-- shop toolbar end -->
						</div>
					</div>
					<!-- right sidebar end -->