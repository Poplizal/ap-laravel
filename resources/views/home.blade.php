@extends('layout');
@section('content')
<div class="container">
  <h2 class="text-center py-3">Blog Sample Site</h2>
  <div class="d-flex justify-content-between">
    <div>
    <a href="/posts/create" class="btn btn-primary">New Post</a>
    <a href="/logout" class="btn btn-danger">logout</a>
  </div>
<div>
      <h1 class="text-secondary">{{Auth::user()->name}}</h1>
</div>
  </div>
<div class="card my-2">
  <div class="card-header text-center">
  Latest Blogs
  </div>
  @if(session('homeSession'))
<div class="alert alert-success">
  {{session('homeSession')}};
</div>
@endif
@if(session('store')) 
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Status </strong> {{session('store')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@foreach($data as $post)
  <div class="card-body">
    <h5 class="card-title">{{$post->name}}</h5>
    <p class="card-text">{{$post->description}}</p>
    <a href="/posts/{{$post->id}}" class="btn btn-primary">View</a>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
    <form action="/posts/{{$post->id}}" method="post" class="my-2">
    @csrf
@method('delete')
     <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
  <hr>
@endforeach
</div>
</div>
@endsection



