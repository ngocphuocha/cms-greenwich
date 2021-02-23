{{-- @php
dd($traineeCourses->toArray());
@endphp --}}
@extends('layouts.trainee')
@section('tilte', 'Courses')
@section('content')
<div class="row">
    <div class="col-5">
      <h3><strong>Courses available</strong></h3>
      <ul class="list-group">
        @foreach ($courses as $course)
        <li class="list-group-item active">{{$course->name}}</li>
        @endforeach  
      </ul>
    </div>
</div>
<div class="row mt-5">
  <div class="col-5">
   <h3><strong><i>My courses</i></strong></h3>
   <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($traineeCourses as $key => $item)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$item->course->name}}</td>
        </tr>  
      @endforeach
    </tbody>
  </table>
  </div>
</div>
@endsection