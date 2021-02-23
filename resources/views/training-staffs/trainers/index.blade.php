{{-- @php
dd($users->toArray());
@endphp --}}
@extends('layouts.training-staff')
@section('title', 'Create Trainee')
@section('content')

<div class="row mt-5">
  <div class="col-7">
    <form action="{{route('training-staff.trainers.index')}}" method="get">
      <div class="form-inline">
        <input type="text" class="form-control" name="search" id="" aria-describedby="helpId"
          placeholder="Search Trainer">
        <button type="submit" class="btn btn-primary ml-3">Search</button>
      </div>
      <div class="form-group">
      </div>
    </form>
  </div>
</div>

<div class="row mt-5">
  <div class="col">
    <h1>List Trainers</h1>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">NO.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col" colspan="4">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users->first()->users as $key => $trainer)
      <tr>
        <th scope="row">{{$key + 1}}</th>
        <td>{{$trainer->name}}</td>
        <td>{{$trainer->email}}</td>
        <td><a href="{{route('training-staff.trainers.assign.view', $trainer->id)}}"
            class="btn btn-outline-success">Assign Course</a>
        </td>
        <td><a class="btn btn-outline-dark"
            href="{{route('training-staff.trainers.detail', ['id' => $trainer->id])}}">Detail</a>
        </td>
        <td><a class="btn btn-outline-dark"
            href="{{route('training-staff.trainers.edit', ['id' => $trainer->id])}}">Edit</a>
        </td>
        <td>
          <form action="{{route('training-staff.trainers.destroy', $trainer->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection