@extends('templates.app')
@section('title', 'All Post')

@section('content')
<div class="d-flex justify-content-between">
  <div>
    <h4>All Post</h4>
  </div>
  <div>
    <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm font-weight-bold">+ Post</a>
  </div>
</div>

<div class="row">

  @forelse ($posts as $post)
  <div class="col-md-4">
    <div class="card my-3">
      <div class="card-header">
        {{ $post->title }}
      </div>
      <div class="card-body">
        <div>
          <p>{{ Str::limit($post->body, 100, '...') }}</p>
        </div>
        <a href="{{ route('post.show', $post->slug) }}">Read More</a>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <small>Published on {{ $post->created_at->diffForHumans() }}</small>
        <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-success btn-sm font-weight-bold">Edit</a>
      </div>
    </div>
  </div>
  @empty
  <div class="col">
    <div class="alert alert-info">
      There are no post!
    </div>
  </div>
  @endforelse
  
  
</div>
{{ $posts->links() }}
@endsection