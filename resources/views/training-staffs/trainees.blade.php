{{-- @php
dd($users->toArray());
@endphp --}}
@extends('layouts.training-staff')
@section('title', 'Create Trainee')
@section('content')
@if (session()->has('success'))
<div class="row">
  <div class="col">
    <div class="alert alert-primary" role="alert">
      <strong>{{session()->get('success')}}</strong>
    </div>
  </div>
</div>
@endif
<div class="row mt-5">
  <div class="col-7">
    <form action="{{route('training-staff.trainees')}}" method="get">
      <div class="form-inline">
        <input type="text" class="form-control" name="search" id=""
          aria-describedby="helpId" placeholder="Search Trainee">
        <button type="submit" class="btn btn-primary ml-3">Search</button>
      </div>
      <div class="form-group">

      </div>
    </form>
  </div>
</div>
<div class="row mt-5">
  <div class="col-12">
    @if (session()->has('error'))
    <div class="alert alert-primary" role="alert">
      <strong>{{session()->get('error')}}</strong>
    </div>
    @endif
    <h1>List trainee</h1>
  </div>
  <div class="col-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">NO.</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col" colspan="3">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users->first()->users as $key => $trainee)
        <tr>
          <th scope="row">{{$key + 1}}</th>
          <td>{{$trainee->name}}</td>
          <td>{{$trainee->email}}</td>
          <td><a
              href="{{route('training-staff.trainees.assign.view', $trainee->id)}}"
              class="btn btn-outline-success">Assign Course</a>
          </td>
          <td><a class="btn btn-outline-dark"
              href="{{route('training-staff.trainees.edit', ['id' => $trainee->id])}}">Edit</a>
          </td>
          <td>
            <form
              action="{{route('training-staff.trainees.destroy', $trainee->id)}}"
              method="post">
              @csrf
              @method('DELETE')
              <button type="submit"
                class="btn btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection