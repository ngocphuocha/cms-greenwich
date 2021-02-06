@extends('layouts.training-staff')
@section('title', 'Edit Trainer')
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
@if (session()->has('success'))
<div class="row">
  <div class="col">
    <div class="alert alert-primary" role="alert">
      <strong>{{session()->get('success')}}</strong>
    </div>
  </div>
</div>
@endif
<div class="row">

  <div class="col">
    {{-- @if (isset($trainee)) --}}
    <h3>Edit Trainee</h3>
    <form action="{{route('training-staff.trainers.update', $trainer->id) }}"
      method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" value="{{ $trainer->name }}"
          name="name" id="" aria-describedby="helpId" placeholder="Enter Name">
        <small id="helpId" class="form-text text-muted">
          @if ($errors->has('name'))
          <p style="color: rgb(9, 153, 163);">{{ $errors->first('name') }}</p>
          @endif
        </small>
      </div>
      <div class="form-group">
        <label for="">New Password</label>
        <input type="text" class="form-control" value="{{ old('password') }}"
          name="password" id="" aria-describedby="helpId"
          placeholder="Enter new password">
        <small id="helpId" class="form-text text-muted">
          @if ($errors->has('password'))
          <p style="color: red;">{{ $errors->first('password') }}</p>
          @endif
        </small>
      </div>
      <div class="form-group">
        <label for="">Password confirm</label>
        <input type="text" class="form-control"
          value="{{ old('password_confirmation') }}"
          name="password_confirmation" id="" aria-describedby="helpId"
          placeholder="Comfirm new password">
        <small id="helpId" class="form-text text-muted">
          @if ($errors->has('password_confirmation'))
          <p style="color: red;">{{ $errors->first('password_confirmation') }}
          </p>
          @endif
        </small>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection