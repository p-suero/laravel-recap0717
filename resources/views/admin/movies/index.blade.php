@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Your movies</h1>
      <a class="btn btn-primary" href="{{route('admin.movies.create')}}">New movie</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Overview</th>
          <th>Rating</th>
          <th>Genre</th>
          <th>Actors</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($movies as $movie)
          <tr>
            <td>{{$movie->id}}</td>
            <td>{{$movie->title}}</td>
            <td>{{$movie->overview}}</td>
            <td>{{$movie->rating}}</td>
            <td>{{$movie->genre->name ?? ''}}</td>
            <td>
                @forelse ($movie->actors as $actor)
                    {{$actor->getFullName()}}
                    @if (!$loop->last)
                        ,
                    @endif
                @empty
                    Nessun attore
                @endforelse
            </td>
            <td>
              <a class="btn btn-info" href="{{route('admin.movies.show', ['movie' => $movie->id])}}">Details</a>
              <a class="btn btn-warning" href="{{route('admin.movies.edit', ['movie' => $movie->id])}}">Edit</a>

              <form action="{{route('admin.movies.destroy', ['movie' => $movie->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
