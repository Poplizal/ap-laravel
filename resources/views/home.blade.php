@extends('layout');
@section('content')
<div class="container">
  <h2 class="text-center py-3">Blog Sample Site</h2>
<div class="card my-2">
  <div class="card-header text-center">
  Latest Blogs
  </div>
@foreach($data as $post)
  <div class="card-body">
    <h5 class="card-title">{{$post->name}}</h5>
    <p class="card-text">{{$post->description}}</p>
    <a href="#" class="btn btn-primary">View</a>
  </div>
  <hr>
@endforeach
</div>
</div>
@endsection




