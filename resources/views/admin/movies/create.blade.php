@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="{{route('admin.movies.store')}}" method="post">
      @csrf
        <div class="form-group">
            <label for="movie-title">Title</label>
            <input class="form-control" type="text" name="title" id="movie-title">
        </div>
        <div class="form-group">
            <label for="movie-overview">Overview</label>
            <textarea class="form-control" name="overview" id="movie-overview" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="movie-rating">Rating</label>
            <input class="form-control" type="number" step="0.1" name="rating" id="movie-rating">
        </div>
        <div class="form-group">
            <label for="movie-genre">Scegli genere</label>
            <select class="form-control" name="genre_id" id="movie-genre">
                @foreach ($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            @foreach ($actors as $actor)
                <input  id="{{"actor" . $actor->id }}" type="checkbox" name="actors[]" value="{{$actor->id}}">
                <label for="{{"actor" . $actor->id }}">{{$actor->getFullName()}}</label>
            @endforeach
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>
  </div>
@endsection
