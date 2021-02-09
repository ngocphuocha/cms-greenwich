@extends('layouts.training-staff')
@section('title', 'Create Trainee')
@section('content')
<div class="row mt-5">
  <div class="col-12">
    @if (session()->has('success'))
    <div class="row">
      <div class="col">
        <div class="alert alert-primary" role="alert">
          <strong>{{session()->get('success')}}</strong>
        </div>
      </div>
    </div>
    @endif
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
      </div>
      <div class="form-group">
        <label for="password">Name</label>
        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Password confrim</label>
        <input type="password" class="form-control" name="password_confirmation" id="" aria-describedby="helpId"
          placeholder="">
      </div>
      <div class="form-group">
        <div class="form-group">
          <label for="">Birthday</label>
          <input type="date" class="form-control" name="birthday" id="" aria-describedby="helpId" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="">Experience</label>
        <textarea class="form-control" name="experience" id="" rows="3">{{old('experience')}}</textarea>
      </div>
      <div class="form-group">
        <label for="">Location</label>
        <input type="text" class="form-control" name="location" value="{{old('location')}}" id=""
          aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <div class="form-group">
          <label for="">Ielts Score</label>
          <input type="number" class="form-control" name="ielts_score" id="" aria-describedby="helpId" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="">Programing Laguage</label>
        <input type="text" class="form-control" name="pro_lang" value="{{old('pro_lang')}}" id=""
          aria-describedby="helpId" placeholder="Enter your programing language">
      </div>
      <div class="form-group">
        <input type="hidden" name="education" value="Greenwich University">
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-success">Create</button>
      </div>
    </form>
  </div>
</div>
@endsection