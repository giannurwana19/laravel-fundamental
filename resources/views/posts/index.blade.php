@extends('layouts.app')
@section('title', 'All Post')

@section('content')
<div class="d-flex justify-content-between">
    <div>
        @isset($category)
        <h4>Category : {{ $category->name }}</h4>
        @endisset

        @isset($tag)
        <h4>Tag : {{ $tag->name }}</h4>
        @endisset

        @if(!isset($tag) && !isset($category))
        <h4>All Post</h4>
        @endif
    </div>
    <div>
        {{-- cek apakah user sudah login atau belum, bisa juga pakai @auth --}}
        @if(auth()->check())
        <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm font-weight-bold">+ Post</a>
        @endif
    </div>
</div>

<div class="row">
    @forelse ($posts as $post)
    <div class="col-md-6">
        <div class="card post-card my-3">
            @if($post->image)
            <a href="{{ route('post.show', $post->slug) }}">
                <img src="{{ $post->image }}" alt="" class="img-post card-img-top">
            </a>
            @endif
            <div class="card-body">
                <div>
                    <a href="{{ route('category.show', $post->category->slug) }}" class="text-secondary">
                        <small>{{ $post->category->name }}</small> |
                    </a>

                    @foreach ($post->tags as $tag)
                    <a href="{{ route('tag.show', $tag->slug) }}" class="badge badge-primary">
                        {{ $tag->name }}
                    </a>
                    @endforeach
                </div>

                <h5 class="mt-2">
                    <a href="{{ route('post.show', $post->slug) }}" class="text-reset text-decoration-none">
                        {{ $post->title }}
                    </a>
                </h5>
                <div>
                    {{ Str::limit($post->body, 130, '...') }}
                </div>

                <div class="d-flex mt-3 justify-content-between">

                    <div class="media align-items-center">
                        <img class="rounded-circle mr-2" width="30" src="{{ $post->author->avatar() }}" alt="">
                        <div class="media-body">
                            <div>
                                {{ $post->author->name }}
                            </div>
                        </div>
                    </div>

                    <div class="text-secondary">
                        <small>Published on {{ $post->created_at->diffForHumans() }}</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="row">
        <div class="col">
            <div class="alert alert-info">
                There are no post!
            </div>
        </div>
    </div>
    @endforelse
</div>

{{-- secara default, akan mengambil file agination::bootstrap4 --}}
{{-- cara panggil style pagination yg lain: --}}
{{-- {{ $posts->links('pagination::semantic-ui') }} --}}

<div class="mt-3">
    {{ $posts->links() }}
</div>
@endsection
