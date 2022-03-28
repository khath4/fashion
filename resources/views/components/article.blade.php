        @if(isset($articleHot))
        <div class="latest-post-area">
            <div class="container">
                <div class="area-title">
                    <h2>Bài Nổi Bật</h2>
                </div>
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        @foreach($articleHot as $arNew)
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id])}}">
                                        <img src="{{ asset(pare_url_file($arNew->a_avatar)) }}" alt=""/>
                                    </a>
                                </div>
                                <div class="post-thumb-info">
                                    <div class="post-time">
                                        <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id])}}">{{ $arNew->a_name }}</a>
                                    </div>
                                    <div class="postexcerpt">
                                        <p>{{ $arNew->a_description }}</p>
                                        <a href="{{ route('get.detail.article',[$arNew->a_slug,$arNew->id])}}" class="read-more">Xem Thêm <i class="post-time2">{{ $arNew->created_at->format('H:i d-m-Y')}}</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- single latestpost end -->          
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- latestpost area end -->