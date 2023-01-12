@extends('front.layout.content')

@section('dashboard-slider')
<div class="swiper">
    <!-- Additional required wrapper -->
	<div class="swiper-wrapper">
		@foreach($allPosts as $post)
			<div class="swiper-slide">
				<input type="hidden" value="{{ $post->id }}">
				<img class="swiper-img" src="{{ asset($post->post_image) }}"
					alt=""></img>
			</div>
		@endforeach
		<!-- Slides -->
	</div>
	<!-- If we need pagination -->
	<div class="swiper-pagination"></div>

	<!-- If we need navigation buttons -->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>

	<!-- If we need scrollbar -->
	<div class="swiper-scrollbar"></div>
</div>
<hr>
    <div class="container">
        <div class="owl-carousel owl-theme" id="owl-carousel-one">
                <!-- Additional required wrapper -->
                @foreach($allPosts as $post)
                    <div class="post-new">
                        <a class="post-img" href="{{ route('front.post', $post->id ) }}"><img
                                src="{{ asset($post->post_image) }}" alt="" style="height: 100px width:100px"></a>
                        <div class="post-body">
							<div class="post-category">
								<a href="{{ route('front.category', $post->category->category_name ) }}">{{ $post->category->category_name }}</a>
							</div>
                            <h3 class="post-title"><a href="{{ route('front.post', $post->id ) }}">{{ $post->post_title }}</a></h3>
                            <span class="post-slug">{{ $post->post_slug }}</span>
                            <ul class="post-meta">
								<li><a href="{{ route('front.user', $post->users->name ) }}">{{ $post->users->name }}</a></li>
								<li>{{ $post->created_at->diffForHumans() }}</li>
							</ul>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
<hr>
@endsection

@section('post')
<div class="col-md-8">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="section-title">
				<h2 class="title">Latest Post</h2>
			</div>
		</div>
		<!-- post -->
		@foreach($posts as $post)
		<div class="col-md-6" >
			<div class="post-new">
				<a class="post-img" href="{{ route('front.post', $post->id ) }}"><img
						src="{{ asset($post->post_image) }}" alt="" style="height: 100px width:100px"></a>
				<div class="post-body">
					<div class="post-category">
						<a href="{{ route('front.category', $post->category->category_name ) }}">{{ $post->category->category_name }}</a>
					</div>
					<h3 class="post-title"><a href="{{ route('front.post', $post->id ) }}">{{ $post->post_title }}</a></h3>
					<span class="post-slug">{{ $post->post_slug }}</span>
					<ul class="post-meta">
						<li><a href="{{ route('front.user', $post->users->name ) }}">{{ $post->users->name }}</a></li>
						<li>{{ $post->created_at->diffForHumans() }}</li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!-- /row -->
	<br>
	<div class="col-md-12">
		<button class="primary-button col-md-12"><a href="{{ route('front.article') }}"> Load More </a></button>
	</div>
</div>
@endsection
@section('dashboard-galery')
<hr>
    <div class="container">
        <h1 class="text-uppercase" style="text-align: center; font-size:40px" >Galery</h1>
    </div>
        <div class="owl-carousel owl-theme" id="bottom-carousel">
            <!-- Additional required wrapper -->
            @foreach($allPosts as $post)
                <div class="item">
                    <img src="{{ asset($post->post_image) }}"
                        alt=""></img>   
                </div>
            @endforeach
        </div>
@endsection
