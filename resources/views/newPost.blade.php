@extends("layout");
@section('content')
<div class="container">
<!-- @if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
<h2 class="text-center text-success">Create a New Post</h2>
<form action="/posts" method="POST">
@csrf
  <div class="form-group my-2">
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="formGroupExampleInput" placeholder="title" >
  </div>
  <div class="form-group my-2">
  @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <label for="formGroupExampleInput2">Description</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" value="{{old('description')}}" name="description" placeholder="description" >
  </div>
<input type="submit" class="btn btn-primary" value="submit">
<a href="/posts" class="btn btn-secondary">back</a>
</form>
</div>
@endsection;