@extends('layouts.trainee')
@section('title','Home')
@section('content')
    <h1>Welcome {{\Auth::user()->name}}</h1>
@endsection
    
