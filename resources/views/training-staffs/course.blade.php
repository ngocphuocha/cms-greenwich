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
        @if($errors->has('name'))
        <p style="color: red;">{{ $errors->first('name') }}</p>
        @endif
        <div class="form-group">
          <label for=""></label>
          <select class="form-control form-control-sm" name="category_id" id="">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        @if($errors->has('category_id'))
        <p style="color: red;">{{ $errors->first('category_id') }}</p>
        @endif
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
    <h2>Courses available</h2>
    <form action="{{route('training-staff.courses.create')}}" class="form-inline mb-5" method="get">
      <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control mr-2" name="search" id="" aria-describedby="helpId"
          placeholder="Search Course">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
    <table class="table table-striped table-inverse">
      <thead class="thead-inverse">
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Categories</th>
          <th colspan="3"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $key => $course)
        <tr>
          <td scope="row">{{$key + 1}}</td>
          <td>{{$course->name}}</td>
          <td>{{$course->category->name}}</td>
          <td><a href="{{route('training-staff.courses.edit', $course->id)}}" class="btn btn-outline-info">Edit</a></td>
          <td>
          <td>
            <form action="{{route('training-staff.courses.destroy', ['course'=> $course->id])}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
          </td>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
<div class="row">
  <div class="col-5">
    {{$courses->links()}}
  </div>
</div>
@endsection