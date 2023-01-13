@extends('back.layout.master')
@section('sub-title','Tambah Post')
@section('content')

{{-- @if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
</div>
@endforeach
@endif --}}
{{-- 
  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
</div>

@endif --}}

<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title">
        @error('post_title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="my-input">Category</label>
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
            @foreach ($category as $item)
            <option value="{{$item->id}}" {{-- {{ $item->brand_code == $product->brand_code ? 'selected' : '' }} --}}>
                {{$item->category_name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="tag_list">Tag</label>
        <select multiple class="form-control @error('tag_list') is-invalid @enderror" class="tag" name="tag_list[]" id="tag_list" data-role="tagsinput">
            @forelse ($tag as $item)
            <option value="{{ $item->id }}">{{ $item->tag_name }}</option>
            @empty
            @endforelse
        </select>
        @error('tag_list')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <small class="text-muted">Type and enter to add a tag.</small>
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea class="form-control @error('post_body') is-invalid @enderror" name="post_body" id="post_body"></textarea>
        @error('post_body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" name="post_image" class="form-control @error('post_image') is-invalid @enderror">
        @error('post_body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Save Post</button>
    </div>

</form>

{{-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script >
  CKEDITOR.replace( 'content' );

</script> --}}

@endsection
@push('js')
<script type="text/javascript">
    $(function () {

        $('#category_id').select2({
            placeholder: '-- Select Category --',
            allowClear: true
        });

        $('#tag_list').select2({
            tags: true,
            tokenSeparators: [','],
        });

    })

</script>
@endpush
