{{-- @php
dd($trainerCourses->toArray());
@endphp --}}
@extends('layouts.trainer')
@section('title')
@section('content')
<div class="row">
  <div class="col">
    <div class="col-5">
      <h3><strong>Courses available</strong></h3>
      <ul class="list-group">
        @foreach ($courses as $course)
        <li class="list-group-item active">{{$course->name}}</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
<div class="row mt-5">
  <div class="col">
    <ul class="list-group">
      <li class="list-group-item active">My Courses</li>
      @foreach ($trainerCourses as $item)
      <li class="list-group-item">{{$item->course->name}}</li>
      @endforeach
    </ul>
  </div>
</div>
@endsection