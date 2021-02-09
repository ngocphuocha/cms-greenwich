@extends('layouts.training-staff')
@isset($trainee)
@section('title', "Detail $trainee->name")
@endisset
@section('content')
@if (isset($trainee))
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
          <th>Education</th>
          <th>Programing Laguage</th>
          <th>Ielts score</th>
          <th>Experience</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">{{$trainee->name}}</td>
          <td>{{$trainee->email}}</td>
          <td>{{$trainee->location}}</td>
          <td>{{$trainee->birthday}}</td>
          <td>{{$trainee->education}}</td>
          <td>{{$trainee->pro_lang}}</td>
          <td>{{$trainee->ielts_score}}</td>
          <td>{{$trainee->experience}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endif
@endsection