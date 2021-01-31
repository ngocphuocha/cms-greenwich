@extends('layouts.trainer')
@section('tilte', 'Edit')
@section('content')
<div class="row">
  <div class="col-5">
    <h2>Edit Your Profile</h2>
    <form action="{{route('trainer.users.update', $user->id) }}" method="POST">
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
        <input type="password" class="form-control" value="{{ old('password') }}" name="password" id=""
          aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">
          @if ($errors->has('password'))
          <p style="color: red;">{{ $errors->first('password') }}</p>
          @endif
        </small>
      </div>
      <div class="form-group">
        <label for="">Password confirm</label>
        <input type="password" class="form-control" value="{{ old('password_confirmation') }}"
          name="password_confirmation" id="" aria-describedby="helpId" placeholder="">
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
  </div>
</div>
@endsection