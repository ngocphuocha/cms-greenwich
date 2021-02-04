@extends('layouts.training-staff')
@section('title', 'Edit')
@section('content')

<div class="row">

  <div class="col">
    {{-- @if (isset($trainee)) --}}
    <h3>Edit Trainee</h3>
    <form action="{{route('training-staff.trainees.update', $trainee->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" value="{{ $trainee->name }}" name="name" id="" aria-describedby="helpId"
          placeholder="">
        <small id="helpId" class="form-text text-muted">
          @if ($errors->has('name'))
          <p style="color: red;">{{ $errors->first('name') }}</p>
          @endif
        </small>
      </div>
      <div class="form-group">
        <label for="">New Password</label>
        <input type="text" class="form-control" value="{{ old('password') }}" name="password" id=""
          aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">
          @if ($errors->has('password'))
          <p style="color: red;">{{ $errors->first('password') }}</p>
          @endif
        </small>
      </div>
      <div class="form-group">
        <label for="">Password confirm</label>
        <input type="text" class="form-control" value="{{ old('password_confirmation') }}" name="password_confirmation"
          id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">
          @if ($errors->has('password_confirmation'))
          <p style="color: red;">{{ $errors->first('password_confirmation') }}</p>
          @endif
        </small>
      </div>
      {{-- <div class="form-group">
        <select class="custom-select" name='course_id[]' multiple>
          @php
          $traineeCourses = $trainee->traineeCourses()->pluck('course_id')->toArray();
          @endphp
          @foreach ($courses as $course)
          <option value="{{$course->id}}" {{ in_array($course->id, $traineeCourses) ? 'selected' : '' }}>
      {{$course->name}}
      </option>
      @endforeach
      </select>
  </div> --}}
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
  </form>
  {{-- @php
    dd($courses);
    @endphp --}}
  {{-- @endif --}}
  {{-- trainer --}}
  {{-- @if (isset($trainer))
    <h3>Edit Trainee</h3>
    <form action="{{route('training-staff.trainers.update', $trainer->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="" aria-describedby="helpId"
      placeholder="">
    <small id="helpId" class="form-text text-muted">
      @if ($errors->has('name'))
      <p style="color: red;">{{ $errors->first('name') }}</p>
      @endif
    </small>
  </div>
  <div class="form-group">
    <label for="">New Password</label>
    <input type="text" class="form-control" value="{{ old('password') }}" name="password" id=""
      aria-describedby="helpId" placeholder="">
    <small id="helpId" class="form-text text-muted">
      @if ($errors->has('password'))
      <p style="color: red;">{{ $errors->first('password') }}</p>
      @endif
    </small>
  </div>
  <div class="form-group">
    <label for="">Password confirm</label>
    <input type="text" class="form-control" value="{{ old('password_confirmation') }}" name="password_confirmation"
      id="" aria-describedby="helpId" placeholder="">
    <small id="helpId" class="form-text text-muted">
      @if ($errors->has('password_confirmation'))
      <p style="color: red;">{{ $errors->first('password_confirmation') }}</p>
      @endif
    </small>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
  </form>
  @endif --}}
</div>
</div>
@endsection