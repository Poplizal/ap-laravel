@extends('layout');
@section('content')
<div class="container">
@foreach($data as $post)
<div class="card my-2">
  <div class="card-header">
  Latest Blogs
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$post->name}}</h5>
    <p class="card-text">{{$post->description}}</p>
    <a href="#" class="btn btn-primary">View</a>
  </div>
</div>
@endforeach
</div>
@endsection



