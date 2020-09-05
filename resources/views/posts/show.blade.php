@extends('templates.app')
@section('title', $post->title)
@section('content')
  <h1>{{ $post->title }}</h1>
@endsection