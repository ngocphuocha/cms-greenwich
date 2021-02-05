@extends('layouts.training-staff')
@section('title', 'Edit')
@section('content')

@if (session()->has('error'))
<div class="row">
  <div class="col">
    <div class="alert alert-primary" role="alert">
      <strong>{{session()->get('error')}}</strong>
    </div>
  </div>
</div>
@endif
{{-- @if (session()->has('success'))
<div class="row">
  <div class="col">
    <div class="alert alert-primary" role="alert">
      <strong>{{session()->get('success')}}</strong>
</div>
</div>
</div>
@endif --}}
<div class="row justify-content-center mt-5">
  <div class="col-5">
    <h3>Edit Course</h3>
    <form action="{{route('training-staff.courses.update', $course->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <div class="form-group">
          <label for="">Course Name:</label>
          <input type="text" class="form-control" value="{{$course->name}}" name="name" id="" aria-describedby="helpId"
            placeholder="Input here">
        </div>
      </div>
      @if ($errors->has('name'))
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"></h4>
        <p class='text-bold'>{{$errors->first('name')}}</p>
        <p class="mb-0"></p>
      </div>
      @endif
      <div class="form-group">
        <div class="form-group">
          <label for="">Category:</label>
          <select class="form-control form-control-sm" name="category_id" id="">
            @php
            $categoryId = $course->category()->pluck('id')->toArray(); // get present category id of this course
            @endphp
            @foreach ($categories as $category)
            <option value="{{$category->id}}" {{in_array($category->id, $categoryId) ? 'selected' : ''}}>
              {{$category->name}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-outline-primary">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection