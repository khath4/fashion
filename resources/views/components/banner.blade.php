@if(isset($banner))
	<div class="banner-area">
		<div class="container-fluid">
		    <div class="row">
		    	@foreach($banner as $item)
	            <a href="{{$item->banner_link}}"><img src="{{ asset(pare_url_file($item->banner_avatar)) }}" alt="" /></a>
	        	@endforeach
	        </div>
	    </div>
	</div>
@endif	