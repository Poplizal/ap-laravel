@extends("layout");
@section('content')
<div class="container">

<h2 class="text-center text-success">Edit a post</h2>
<form action="/posts/{{$datatoEdit->id}}" method="post">
@csrf
@method('put')
  <div class="form-group my-2">
  @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control"  name="title" id="formGroupExampleInput" value="{{ old('title',$datatoEdit->name) }}">
  </div>
  <div class="form-group my-2">
  @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <label for="formGroupExampleInput2">Description</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="description"value="{{ old('description',$datatoEdit->description)}}">
  </div>
  @error('category')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <select name="category" class="form-select my-3" aria-label="Default select example ">
  <!-- <option selected >{{$datatoEdit->post_category->name}}</option> -->
  @foreach($categories as $category)
  <option value="{{$category->id}}" {{ $datatoEdit->category_id == $category->id ? "selected" : null}}>{{$category->name}}</option>
@endforeach
</select>
<input type="submit" class="btn btn-primary" value="submit">
<a href="/posts" class="btn btn-secondary">back</a>
</form>
</div>
@endsection;


