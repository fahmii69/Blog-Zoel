@extends('template_blog.content')

@section('isi')

	@foreach($data as $isi_post)

	<div id="post-header" class="page-header">
			<div class="page-header-bg" style="
			background-image: url( {{asset($isi_post->gambar) }} );" 

			data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $isi_post->category->name }}</a>
						</div>
						<h1>{{ $isi_post->judul }}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{{ $isi_post->users->name }}</a></li>
							<li>{{ $isi_post->created_at }}</li>
						
							<!-- <li><i class="fa fa-eye"></i> 807</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
	<div class="col-md-8 hot-post-left">
	<br>
		<div class="section-row">



		{!! $isi_post->content !!}

		</div>
	@endforeach
	</div>

@endsection

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

</div>
		<div class="col-md-8">
			<!-- row -->
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
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
					<hr>
				</div>
				<div>
					<img
					 {{asset($post->post_image) }}></img>
				</div>
				{!! $post->post_body !!}
			</div>

		</div>
@endsection