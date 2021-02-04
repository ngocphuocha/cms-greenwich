@extends('layouts.training-staff')
@section('title', 'Assign Course')
@section('content')
{{-- @php
dd($user->traineeCourses()->pluck('course_id')->toArray());
@endphp --}}
<div class="row mt-5">
  <div class="col-12">
    <h2>Assign course</h2>
    <p>UserName: <i style="color: blueviolet">{{$user->name}}</i></p>
  </div>
  <div class="col-5">
    <form action="{{route('training-staff.trainees.assign.store', $user->id)}}" method="POST">
      @csrf
      {{-- <div class="form">
        <input type="hidden" name="user_id" value="{{$user->id}}">
  </div> --}}
  <div class="form-group">
    <select class="custom-select" name='course_id'>
      @php
      $listCourseId = $user->traineeCourses()->pluck('course_id')->toArray();
      @endphp
      @foreach ($courses as $course)
      {{-- if coursesID of course not have in courseID of trainee then show it --}}
      <option value="{{$course->id}}" {{ in_array($course->id, $listCourseId) ? 'disabled' : 'selected' }}>
        {{$course->name}}
      </option>
      {{--  --}}
      @endforeach
    </select>
  </div>
  <div class="form-group mt-2">
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
  </form>
</div>
</div>
<div class="row">
  <div class="col-8">
    <h2>Courses of this User:</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if (isset($traineeCourses))

        @foreach ($traineeCourses as $key => $item)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$item->course->name}}</td>
          <td>
            <form
              action="{{route('training-staff.trainees.assign.delete', ['id'=> $user->id, 'course_id'=> $item->course->id])}}"
              method="POST">
              @csrf
              @method('DELETE')
              <div class="form-group">
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </form>
          </td>
        </tr>
        @endforeach

        @endif
        {{-- display success --}}
        @if (session()->has('success'))
        <div class="row">
          <div class="col">
            <div class="alert alert-primary" role="alert">
              <strong>{{session()->get('success')}}</strong>
            </div>
          </div>
        </div>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection