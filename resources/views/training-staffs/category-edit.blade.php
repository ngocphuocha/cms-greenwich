@extends('layouts.training-staff')
@section('title', 'Courses')
@section('content')
<div class="row justify-content-center">
  <div class="col-4">
    <h1>Edit Category</h1>
    <form action="{{route('training-staff.categories.update', $category->id)}}"
      method="post">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="category">Category name:</label>
        <input type="text" value="{{$category->name}}" class="form-control"
          name="name" id="category" aria-describedby="helpId"
          placeholder="Enter category name">
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-outline-dark">Update</button>
      </div>
    </form>
    @if ($errors->has('name'))
    <div class="alert alert-danger" role="alert">
      <strong>{{$errors->first('name')}}</strong>
    </div>
    @endif
  </div>
</div>
@endsection