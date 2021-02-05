@extends('layouts.training-staff')
@section('title', 'Courses')
@section('content')
<div class="row">
  <div class="col-5">
    @if (isset($categories))
    @if (session()->has('success'))
    <div class="row">
      <div class="col">
        <div class="alert alert-primary" role="alert">
          <strong>{{session()->get('success')}}</strong>
        </div>
      </div>
    </div>
    @endif
    <h1>Add course</h1>
    <form action="{{route('training-staff.courses.store')}}" method="post">
      @csrf
      <div class="form-group">
        <div class="form-group">
          <label for="">Course name</label>
          <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"
            placeholder="Enter course Name">
        </div>
        <div class="form-group">

          <label for=""></label>
          <select class="form-control form-control-sm" name="category_id" id="">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add Course</button>
        </div>
      </div>
    </form>
    @endif
  </div>
</div>
<div class="row">
  <div class="col-8">
    @if (isset($courses))
    <form action="" method="get">

    </form>
    <h2>Courses available</h2>

    <table class="table table-striped table-inverse">
      <thead class="thead-inverse">
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Categories</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $key => $course)
        <tr>
          <td scope="row">{{$key + 1}}</td>
          <td>{{$course->name}}</td>
          <td>{{$course->category->name}}</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection