@extends('templates.app')
@section('title', 'Update Post')

@section('content')
<div class="row">
  <div class="col-md-6">

    <div class="card">
      <div class="card-header">Update Post</div>
      <div class="card-body">
        <form action="{{ route('post.update', $post->slug ) }}" method="POST">
          @csrf
          @method('PATCH')

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