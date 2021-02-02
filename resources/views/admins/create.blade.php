@extends('layouts.master')
@section('content')
<h1>Create User</h1>
<form action="{{route('admin.users.store')}}" method="POST">
  @csrf
  <div class="form-group">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" autocomplete="off">

      @if($errors->has('email'))
      <p style="color: red;">{{ $errors->first('email') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" autocomplete="off">
      @if($errors->has('name'))
      <p style="color: red;">{{ $errors->first('name') }}</p>
      @endif
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password"
        autocomplete="off">
      @if($errors->has('password'))
      <p style="color: red;">{{ $errors->first('password') }}</p>
      @endif
    </div>
    {{-- single role list add --}}
    <select name="role_id" id="role" class="form-control form-control">
      @foreach ($roles as $role)
      <option value="{{ $role->id }}">{{ $role->name }}</option>
      @endforeach
    </select>
    {{-- mutiple role add --}}
    {{-- <select name="role_id[]" id="role" class="form-control form-control-lg" multiple>
      @foreach ($roles as $role)
      <option value="{{ $role->id }}">{{ $role->name }}</option>
    @endforeach
    </select> --}}
    <div class="form-group mt-3 text-center">
      <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>
@endsection