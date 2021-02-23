@extends('layouts.app');
@section('title', 'Error')
@section('content')
<div class="row mt-5 justify-content-center">
  <div class="col">
    <div class="card text-left">
      <div class="card-body text-bold text-center">
        <h4 class="card-title">{{ __('User not found') }}</h4>
      </div>
      <div class="card-footer text-bold text-center">
        <a href="{{ url()->previous() }} " class="btn btn-outline-dark">{{ __('Click here to back') }}</a>
      </div>
    </div>
  </div>
</div>
@endsection