@extends('layouts.app');

@section('content')
  <div class="container">
    <h1>{{$movie->title}} </h1>
    <p><strong>Overview:</strong> {{$movie->overview ?? "-"}}</p>
    <p><strong>Rating:</strong> {{!empty($movie->rating) ? $movie->rating : "-" }}</p>
    <p><strong>Genres:</strong> {{$movie->genre->name ?? "-"}}</p>
    <p><strong>Attori:</strong>
        @forelse ($movie->actors as $actor)
            {{$actor->getFullName()}}
            @if (!$loop->last)
                ,
            @endif
        @empty
            Nessun attore
        @endforelse</p>
  </div>
@endsection
