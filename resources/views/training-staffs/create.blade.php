@extends('layouts.training-staff')
@section('title', 'Create Trainee')
@section('content')
<div class="row mt-5">
  <div class="col-12">
    <h2>Create Trainee Account</h2>
  </div>
  <div class="col">
    <form action="{{route('training-staff.users.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <input type="hidden" name="role_id" value="{{$role->first()->id}}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Help text</small>
      </div>
      <div class="form-group">
        <label for="password">Name</label>
        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Help text</small>
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Help text</small>
      </div>
      <div class="form-group">
        <label for="">Password confrim</label>
        <input type="text" class="form-control" name="password_confirmation" id="" aria-describedby="helpId"
          placeholder="">
        <small id="helpId" class="form-text text-muted">Help text</small>
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-success">Create</button>
      </div>
    </form>
  </div>
</div>
@endsection