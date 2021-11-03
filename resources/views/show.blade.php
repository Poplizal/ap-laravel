@extends('layout');
@section('content')
<div class="container">
  <h2 class="text-center py-3">Blog Sample Site</h2>

<div class="card my-2">
  <div class="card-header text-center">
  View Post
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$post->name}}</h5>
    <p class="card-text">{{$post->description}}</p>
    <p class="card-text">{{$post->post_category->name}}</p>
    <a href="/posts" class="btn btn-primary">back</a>
  </div>
  <hr>
</div>
</div>
@endsection
