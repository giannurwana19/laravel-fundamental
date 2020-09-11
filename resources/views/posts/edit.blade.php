@extends('layouts.app')
@section('title', 'Update Post')

@section('content')
<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">Update Post</div>
            <div class="card-body">
                <form action="{{ route('post.update', $post->slug ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="tumbnail">Tumbnail</label>
                        <input type="file" name="tumbnail" value="{{ old('tumbnail') }}"
                            class="form-control @error('tumbnail') is-invalid @enderror" id="tumbnail">
                        @error('tumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title') ?? $post->title }}"
                            class="form-control @error('title') is-invalid @enderror" id="title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category"
                            class="custom-select @error('category') is-invalid @enderror">
                            <option disabled selected>Choose One</option>
                            @foreach ($categories as $category)
                            <option @if($category->id == $post->category_id) selected @endif
                                value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tags">Tag</label>
                        <select name="tags[]" id="tags"
                            class="custom-select select2 @error('tags') is-invalid @enderror" multiple>
                            @foreach ($post->tags as $tag)
                            <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body"
                            rows="3">{{ old('body') ?? $post->body }}</textarea>
                        @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block font-weight-bold">Update</button>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection