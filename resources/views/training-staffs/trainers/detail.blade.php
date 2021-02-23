@extends('layouts.training-staff')
@isset($trainer)
@section('title', "Detail $trainer->name")
@endisset
@section('content')
@if (isset($trainer))
<div class="row">
  <div class="col">
    <h3>Detail profile</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Birtday</th>
          <th>Experience</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">{{$trainer->name}}</td>
          <td>{{$trainer->email}}</td>
          <td>{{$trainer->location}}</td>
          <td>{{$trainer->birthday}}</td>
          <td>{{$trainer->experience}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endif
@endsection