{{-- @php
dd($users->toArray());
@endphp --}}
@extends('layouts.training-staff')
@section('title', 'Create Trainee')
@section('content')
<div class="row mt-5">
  <div class="col-12">
    <h1>List trainee</h1>
  </div>
  <div class="col-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">NO.</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users->first()->users as $key => $trainee)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>{{$trainee->name}}</td>
          <td>{{$trainee->email}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection