@extends('layouts.trainer')
@section('content')
<div class="row">
  <div class="col">
    <div class="alert alert-primary" role="alert">
      Success. <a href="{{route('trainer.home')}}">Go to home page</a>
    </div>
  </div>
</div>
@endsection