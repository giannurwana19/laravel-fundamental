@extends('layouts.app')
@section('title', 'Create New Post')

@section('content')
<div class="row">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">New Post</div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                        <input type="text" name="title" value="{{ old('title') }}"
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                            rows="3"></textarea>
                        @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block font-weight-bold">Create</button>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection