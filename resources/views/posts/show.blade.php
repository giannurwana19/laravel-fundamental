@extends('layouts.app')
@section('title', $post->title)
@section('content')

<div class="row">

    <div class="col-md-8">
        <img height="550" src="{{ $post->image }}" alt="" class="rounded w-100"
            style="object-fit: cover; object-position: center">


        <h1>{{ $post->title }}</h1>
        <div class="text-secondary">
            <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->name }}</a> &middot;
            {{ $post->created_at->format('d F Y') }}
            &middot;

            {{-- tags --}}
            @foreach ($post->tags as $tag)
            <a href="{{ route('tag.show', $tag->slug) }}" class="badge badge-primary">{{ $tag->name }}</a>
            @endforeach

            <div class="media mt-2">
                <img class="rounded-circle mr-3" width="50" src="{{ $post->author->avatar() }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $post->author->name }}
                    </div>
                    {{ '@' . $post->author->username }}
                </div>
            </div>

            <hr>
        </div>
        {{-- nl2br() : baris baru pada setiap paragraf --}}
        <p>{!! nl2br($post->body) !!}</p>

        {{-- cek jika user nya yg punya post, maka bisa menghapus   --}}
        {{-- @if(auth()->user()->id == $post->user_id) --}}

        {{-- atau --}}

        {{-- @if(auth()->user()->is($post->author )) --}}

        {{--dengan policy --}}
        @can('delete', $post)
        <div class="flex">

            <button type="button" class="btn btn-danger btn-sm font-weight-bold" data-toggle="modal"
                data-target="#deleteModal">
                Delete
            </button>


            {{-- ini dengan policy --}}
            {{-- karena sudah ada @can, jadi tidak perlu --}}
            {{-- karena funtion yg kita buat di update dan delete itu sama, kita bisa hilangkan updatenya --}}
            {{-- @can('update', $post)   --}}
            <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-success btn-sm font-weight-bold">Edit</a>
            {{-- @endcan --}}

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapusnya?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="content mb-2">
                                <div>{{ $post->title }}</div>
                                <small>{{ $post->created_at->format('d F Y') }}</small>
                            </div>

                            <form action="{{ route('post.destroy', $post->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="button">
                                    <button type="button" class="btn btn-info btn-sm mr-1 font-weight-bold"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold">Yes,
                                        Delete</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        @endcan

        {{-- @endif --}}

    </div>

    {{-- tampilkan post dengan kategori yang sama dengan post saat ini --}}
    <div class="col-md-4">
        @foreach($posts as $post)
        <div class="card mb-3">
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
                    {{ Str::limit($post->body, 100, '...') }}
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

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection