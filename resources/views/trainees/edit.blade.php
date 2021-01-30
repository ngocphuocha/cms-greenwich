@extends('layouts.trainee')
@section('tilte', 'Edit')
@section('content')
<div class="row">
  <div class="col-5">
  <h2>Edit Your Profile</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    <div class="form-group">
      <label for="">New Password</label>
      <input type="text" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    <div class="form-group">
      <label for="">Password confirm</label>
      <input type="text" class="form-control" name="password_confirmation" id="" aria-describedby="helpId" placeholder="">
      <small id="helpId" class="form-text text-muted">Help text</small>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
  </div>
</div>
@endsection