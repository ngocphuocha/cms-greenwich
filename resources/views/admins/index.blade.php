@extends('layouts.master')
@section('content')
@if(isset($role))
<h1>List User of Role: {{ $role->name}}</h1>
@else
<h1>List User </h1>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    @if(isset($role))
    @foreach($role->users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
    </tr>
    @endforeach
    @else
    @foreach($users as $key => $user)
    @foreach ($user->users as $item)
    <tr>
      <th scope="row">{{$key +1 }}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td><a class="btn btn-outline-primary" href="{{route('admin.users.edit', $user->id)}}">Edit</a></td>
      <td>
        <form action="{{route('admin.users.destroy', $user->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
    @endforeach
    @endif
  </tbody>
</table>
@if (!isset($role))
<div class="row justify-content-center ">
  <div class="col-5">
    {{$users->links()}}
  </div>
</div>
@endif
@endsection