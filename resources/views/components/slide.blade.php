        @if(isset($sliders))
        <div class="slider-area an-1 hm-1">
            <!-- slider -->
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider" class="slides"> 
                    @foreach($sliders as $slider)
                        <img src="{{ asset(pare_url_file($slider->s_avatar)) }}" alt="" title="#slider-direction-{{$slider->id}}"/>
                    @endforeach
                </div>
                <!-- direction 1 -->
                @foreach($sliders as $slider)
                <div id="slider-direction-{{$slider->id}}" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-cn s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <h3 class="title2" ><a href="{{$slider->s_link}}">{{$slider->s_title}}</a></h3>
                            <h2 class="title1">{{$slider->s_description}}</h2>
                            <a class="btn-title" href="{{$slider->s_link}}">Xem Ngay</a>
                        </div>
                    </div>  
                </div>
                @endforeach
                <!-- direction 2 -->
            <!--     <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-2 lft-pr">
                        <div class="title-container s-tb-c">
                            <h2 class="title1">minimal bags</h2>
                            <h3 class="title2" ><a href="">collection</a></h3>
                            <h4 class="title2" >Simple is the best.</h4>
                            <a class="btn-title" href="">View collection</a>
                        </div>
                    </div>  
                </div> -->
            </div>
            <!-- slider end-->
        </div>
        @endif