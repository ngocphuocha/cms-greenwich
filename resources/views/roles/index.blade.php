@extends('layouts.master')
@section('content')
    <h1>List Role</h1>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
          <tr>
            <th scope="row">{{$role->id}}</th>
            <td><a href={{ route('admin.roles.list_users', $role->id) }}>{{ $role->name }}</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection