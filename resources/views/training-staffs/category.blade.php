@extends('layouts.training-staff')
@section('title', 'Courses')
@section('content')
@if (session()->has('error'))
<div class="row mt-4">
  <div class="col">
    <div class="alert alert-primary" role="alert">
      <strong>{{session()->get('error')}}</strong>
    </div>
  </div>
</div>
@endif
<div class="row">
  <div class="col-5">
    <form action="{{route('training-staff.categories.index')}}" method="get">
      <div class="form-group">
        <label for="">Search</label>
        <input type="text" class="form-control" name="search" id=""
          aria-describedby="helpId" placeholder="Search category">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
      </div>
    </form>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <h3>List Categories</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Name</th>
          <th scope="col" colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $key => $category)
        <tr>
          <td>{{$key + 1 }}</td>
          <td>{{$category->name}}</td>
          <td><a
              href="{{route('training-staff.categories.edit', $category->id)}}"
              class="btn btn-outline-dark">Edit</a></td>
          <td>
            <form
              action="{{route('training-staff.categories.destroy', $category->id)}}"
              method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-5">
    <h2 style="font-weight: bold">Add categories</h2>
    <form action="{{route('training-staff.categories.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <div class="form-group">
          <label for="">Category Name:</label>
          <input type="text" class="form-control" name="name" id=""
            aria-describedby="helpId" placeholder="Enter name">
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    @if ($errors->has('name'))
    <div class="alert alert-warning" role="alert">
      <strong>{{$errors->first('name')}}</strong>
    </div>
    @endif
  </div>
</div>

@endsection