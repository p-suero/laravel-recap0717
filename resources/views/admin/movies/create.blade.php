@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('admin.movies.store')}}" method="post">
      @csrf
      <label for="movie-title">Title</label>
      <input type="text" name="title" id="movie-title">
      <label for="movie-overview">Overview</label>
      <textarea name="overview" id="movie-overview" cols="30" rows="10"></textarea>
      <label for="movie-rating">Rating</label>
      <input type="number" step="0.1" name="rating" id="movie-rating">
      <label for="movie-genre"></label>
      <select name="genre_id" id="movie-genre">
        @foreach ($genres as $genre)
          <option value="{{$genre->id}}">{{$genre->name}}</option>
        @endforeach
      </select>
      <button class="btn btn-primary" type="submit">Create</button>
    </form>
  </div>
@endsection