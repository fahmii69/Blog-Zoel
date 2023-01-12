<div class="col-md-4">
	<!-- social widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title">Social Media</h2>
		</div>
		<div class="social-widget">
			<ul>
				<li>
					<a href="#" class="social-facebook">
						<i class="fa fa-facebook"></i>
						<span>21.2K<br>Followers</span>
					</a>
				</li>
				<li>
					<a href="#" class="social-twitter">
						<i class="fa fa-twitter"></i>
						<span>10.2K<br>Followers</span>
					</a>
				</li>
				<li>
					<a href="#" class="social-google-plus">
						<i class="fa fa-google-plus"></i>
						<span>5K<br>Followers</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /social widget -->

	<!-- Youtube widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title"> <i class="fa fa-youtube-play"></i> Video Youtube</h2>
		</div>
			<form>
				<iframe src="{{ getSetting('youtube_link') }}" width="{{ getSetting('widget_width') }}" height="{{ getSetting('widget_height') }}" frameborder="0" allowfullscreen></iframe>
			</form>
	</div>
	<!-- /Youtube widget -->

	<!-- category widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title"><i class="fa fa-tags" aria-hidden="true"></i>Categories</h2>
		</div>
		<div class="category-widget">
			<ul>
				@foreach($category_widget as $result)
					<li><a href="{{ route('front.category', $result->category_name) }}">
						{{ $result->category_name }}
				<span>{{ $result->post->count() }}</span></a></li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- /category widget -->

	<!-- maps widget -->
	<div class="aside-widget">
		<div class="section-title">
			<h2 class="title"> <i class="fa fa-street-view" aria-hidden="true"></i> Location</h2>
		</div>
			<ul>
				<iframe src="{{ getSetting('maps_location') }}" width="{{ getSetting('widget_width') }}" height="{{ getSetting('widget_height') }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</ul>
	</div>
	<!-- /maps widget -->
</div>