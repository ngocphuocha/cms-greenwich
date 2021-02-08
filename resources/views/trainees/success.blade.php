@extends('layouts.trainee')
@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="col">
      <div class="alert alert-primary" role="alert">
        Success. <a href="{{route('trainee.home')}}">Go to home page</a>
      </div>
    </div>
  </div>
</div>
@endsection