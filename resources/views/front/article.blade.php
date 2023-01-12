@extends('front.layout.content')
@section('post')
<div class="page-header">
	<div class="page-header-bg" style="background-image: url('https://picsum.photos/1200/300?random=87916'); background-position: 0% 0%;">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<h1 class="text-uppercase">{{ $title ?? 'No Title' }}</h1>
			</div>
		</div>
	</div>

</div>
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
				<div class="col-md-12 " >
					<div class="post post-row">
						<a class="post-img" href="{{ route('front.post', $post->id ) }}"><img
								src="{{ asset($post->post_image) }}" alt="" style="height: 100px width:100px"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('front.category', $post->category->category_name ) }}">{{ $post->category->category_name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('front.post', $post->id ) }}">{{ $post->post_title }}</a></h3>
                            <span >{{ $post->post_slug }}</span>
							<ul class="post-meta">
								<li>
									<a href="{{ route('front.user', $post->users->name ) }}">
									{{ $post->users->name }}</a>
								</li>
								<li>{{ $post->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<!-- /row -->
			<br>
			<div class="text-center mt-30">
				{{$posts->links()}}
			</div>
		</div>
@endsection