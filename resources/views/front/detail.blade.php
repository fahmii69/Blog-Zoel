@extends('front.layout.content')
@section('post')
{{-- <div id="post-header" class="page-header">
	<div class="page-header-bg" style="
	background-image: url( {{asset($post->post_image) }} );" 

	data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-category">
					<a href="{{ route('front.category', $post->category->category_name ) }}">{{ $post->category->category_name }}</a>
				</div>
				<h1>{{ $post->post_title }}</h1>
				<ul class="post-meta">
					<li>
						<a href="{{ route('front.user', $post->users->name ) }}">
						{{ $post->users->name }}</a>
					</li>
					<li>{{ $post->created_at}}</li>	
				</ul>
				
					<!-- <li><i class="fa fa-eye"></i> 807</li> -->
				</ul>
			</div>
		</div>
	</div>
</div> --}}

<div class="col-md-8">
	<div class="post post-thumb">
		<a class="post-img" href="{{ route('front.post', $post->id ) }}"><img src="{{ asset($post->post_image) }}" alt=""></a>
		<div class="post-body">
			<div class="post-category">
				<a href="{{ route('front.category', $post->category->category_name ) }}">{{ $post->category->category_name }}</a>
			</div>
			<h3 class="post-title"><a href="{{ route('front.post', $post->id ) }}"> {{ $post->post_title }}</a></h3>
			<ul class="post-meta">
				<li>
					<a href="{{ route('front.user', $post->users->name ) }}">
					{{ $post->users->name }}</a>
				</li>
				<li>{{ $post->created_at->diffForHumans() }}</li>
			</ul>
		</div>
	</div>

	<div class="col-md-12" >
		{!! $post->post_body !!}

		{{-- <div class="section-row"> --}}
			<div class="post-tags" style="margin-top: 20px;">

				<ul>
					<li>TAGS:</li>
					{{-- @foreach ($post as $posts) --}}
					<li><a href="{{ route('front.tags', $post->tags->tag_name) }}">{{ $post->tags->tag_name }}</a></li>	
					{{-- @endforeach --}}
				</ul>

			</div>
		{{-- </div> --}}
	</div>
	<!-- /row -->
	<br>
</div>
@endsection