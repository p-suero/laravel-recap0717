@extends('layouts.app');

@section('content')
  <div class="container">
    <h1>{{$movie->title}} </h1>
    <p><strong>Overview:</strong> {{$movie->overview}}</p>
    <p><strong>Rating:</strong> {{$movie->rating}}</p>
  </div>
@endsection