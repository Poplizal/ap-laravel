@extends('layout');
@section('content')
<div class="container">
  <h2 class="text-center py-3">Blog Sample Site</h2>
  <div>
    <a href="/posts/create" class="btn btn-primary">New Post</a>
  </div>
<div class="card my-2">
  <div class="card-header text-center">
  Latest Blogs
  </div>
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



