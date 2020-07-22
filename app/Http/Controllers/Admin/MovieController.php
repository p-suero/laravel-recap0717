<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Actor;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      $movies = Movie::all();
      return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $genres = Genre::all();
      $actors = Actor::all();
      $data = [
          "genres" => $genres,
          "actors" => $actors
      ];
      return view('admin.movies.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $movie = new Movie();
      $data = $request->all();
      $movie->fill($data);
      $movie->save();
      if (!empty($data["actors"])) {
          $movie->actors()->sync($data["actors"]);
      }
      return redirect()->route('admin.movies.show', ['movie' => $movie->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $movie = Movie::find($id);
      return view('admin.movies.show', compact('movie'));
    }


    public function edit($id)
    {
      $movie = Movie::find($id);
      $genres = Genre::all();
      $actors = Actor::all();
      $data = [
          "movie" => $movie,
          "genres" => $genres,
          "actors" => $actors
      ];
      return view('admin.movies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $movie = Movie::find($id);
      $data = $request->all();
      $movie->update($data);
      if (!empty($data["actors"])) {
          $movie->actors()->sync($data["actors"]);
      } else {
          $movie->actors()->detach();
      }
      return redirect()->route('admin.movies.show', ['movie' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $movie = Movie::find($id);
      $movie->actors()->detach();
      $movie->delete();

      return redirect()->route('admin.movies.index');
    }
}
