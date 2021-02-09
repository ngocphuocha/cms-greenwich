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
        <div class="form-group">
          <label for="">Birthday</label>
          <input type="date" class="form-control" name="birthday" value="{{ $user->birthday}}" id=""
            aria-describedby="helpId" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="">Experience</label>
        <textarea class="form-control" name="experience" id="" rows="3">{{ $user->experience }}</textarea>
      </div>
      <div class="form-group">
        <label for="">Location</label>
        <input type="text" class="form-control" name="location" value="{{ $user->location }}" id=""
          aria-describedby="helpId" placeholder="">
      </div>
      {{-- <div class="form-group">
        <div class="form-group">
          <label for="">Ielts Score</label>
          <input type="number" class="form-control" name="ielts_score" value="{{ $user->ielts_score }}" id=""
      aria-describedby="helpId" placeholder="">
  </div>
</div> --}}
{{-- <div class="form-group">
  <label for="">Programing Laguage</label>
  <input type="text" class="form-control" name="pro_lang" value="{{ $user->pro_lang }}" id="" aria-describedby="helpId"
placeholder="Enter your programing language">
</div> --}}
<div class="form-group">
  <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
</div>
</div>
@endsection