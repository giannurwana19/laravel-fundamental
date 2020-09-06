@extends('templates.app')
@section('title', 'All Post')

@section('content')
    <div class="row">
      <div class="col-md-6">
        <h4>All Post</h4>

        @foreach ($posts as $post)
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
          <div class="card-footer">
            <small>Published on {{ $post->created_at->diffForHumans() }}</small>
          </div>
        </div>
        @endforeach

        {{ $posts->links() }}

      </div>
    </div>
@endsection