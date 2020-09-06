@extends('templates.app')
@section('title', 'Create New Post')

@section('content')
    <div class="row">
      <div class="col-md-6">

        <div class="card">
          <div class="card-header">New Post</div>
          <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST">
              @csrf

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title">
              </div>

              <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" class="form-control" id="body" rows="3"></textarea>
              </div>

              <button type="submit" class="btn btn-primary btn-block font-weight-bold">Create</button>

            </form>
          </div>
        </div>

      </div>
    </div>
@endsection