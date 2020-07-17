@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('admin.movies.update', ['movie' => $movie->id])}}" method="post">
      @csrf
      @method('PUT')
      <label for="movie-title">Title</label>
      <input type="text" name="title" id="movie-title" value="{{$movie->title}}">
      <label for="movie-overview">Overview</label>
      <textarea name="overview" id="movie-overview" cols="30" rows="10">{{$movie->overview}}</textarea>
      <label for="movie-rating">Rating</label>
      <input type="number" step="0.1" name="rating" id="movie-rating" value="{{$movie->rating}}">
      <label for="movie-genre"></label>
      <select name="genre_id" id="movie-genre">
        @foreach ($genres as $genre)
          <option value="{{$genre->id}}" {{$genre->id == $movie->genre_id ? 'selected' : ''}}>{{$genre->name}}</option>
        @endforeach
      </select>
      <button class="btn btn-primary" type="submit">Update</button>
    </form>
  </div>
@endsection