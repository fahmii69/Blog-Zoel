@extends('back.layout.master')
@section('sub-title','Edit Post')
@section('content')

<form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title"
            value="{{ old('post_title') ?? $post->post_title }}">
        @error('post_title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="my-input">Category</label>
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') ?? $post->category_id }}">
            @foreach ($category as $item)
            <option value="{{$item->id}}"  @selected($post->category_id === $item->id)>
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
        <select multiple class="form-control @error('tag_list') is-invalid @enderror" class="tag" name="tag_list[]"
            id="tag_list" data-role="tagsinput">
            @forelse ($tag as $item)
            <option value="{{ $item->id }}"
                @selected(in_array($item->tag_name, $listTag->toArray()))
                >{{ $item->tag_name }}</option>
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
        <textarea class="form-control @error('post_body') is-invalid @enderror" style=" height: 400px !important;" name="post_body"
            id="post_body">{{ old('post_body') ?? $post->post_body }}</textarea>
        @error('post_body')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Choose image from your computer :</label>
        <div class="col-md-3">
            @if($post->hasFile())
            <img class="img-responsive" src="{{ $post->imageAsset() }}" alt="image" style="max-width: 300px;max-height:200px">
            @endif
        </div>
        <span class="form-control @error('post_image') is-invalid @enderror">
            <i class="fa fa-folder-open"></i>&nbsp;Browse
            <input type="file" name="post_image">
        </span>
        @error('post_image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block"> Submit </button>
    </div>

</form>
@endsection
@push('js')
<script type="text/javascript">
    $(function () {

        $('#category_id').select2({
            allowClear: true
        });

        $('#tag_list').select2({
            tags: true,
            tokenSeparators: [','],
        });

    })

</script>
@endpush
