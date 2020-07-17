<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;
use App\Genre;

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
      return view('admin.movies.create', compact('genres'));
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
      return view('admin.movies.edit', compact('movie', 'genres'));
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
      $movie->delete();
      return redirect()->route('admin.movies.index');
    }
}
