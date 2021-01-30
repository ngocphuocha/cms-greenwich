@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-primary" role="alert">
               Success. <a href="{{route('admin.roles.index')}}">Go to home page</a>
              </div>
        </div>
        
    </div>
</div>
@endsection