<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        $movies = Movie::get();
        return view('movies.home',compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $movie = new Movie();
        $request->validate([
            'title' => 'required',
            'year' => 'required'
        ]);
        $hoy             = date("Y-m-d");
        $fechaFormulario = $request->year;
        
        if ($hoy >= $fechaFormulario) {

            $movie->user_id = auth()->user()->id;
            $movie->title = e($request->title);
            $movie->synopsis = e($request->synopsis_);
            $movie->year = $request->year;
            $movie->save();
            return redirect()->route('movie_home')->with('status', 'se ha guardado la pelicula con exito');
        }
        else {
            return back()->with('error','la fecha no puede ser mayor a la fecha actual!');
        }
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit',compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        // $this->authorize('update', $movie);
        $response = Gate::inspect('update', $movie);
        if ($response->allowed()) {

            $request->validate([
                'title' => 'required',
                'year' => 'required'
            ]);
            $movie->user_id = auth()->user()->id;
            $movie->title = e($request->title);
            $movie->synopsis = e($request->synopsis_);
            $movie->year = $request->year;
            $movie->save();
            
        } else {
            echo $response->message();
        }
        
        return redirect()->route('movie_home')->with('status', 'se ha actualizado la pelicula con exito');

    }

    public function destroy(Movie $movie)
    {
        $this->authorize('update', $movie);
        $movie->delete();
        return redirect()->route('movie_home')->with('status', 'se ha eliminado la pelicula con exito');
    }

    public function show(Movie $movie)
    {
        $user = User::where('id', $movie->user_id)->first();
        return view('movies.show',compact('movie', 'user'));
    }

    public function trash($module)
    {
        $user = auth()->user()->id;
        switch($module)
        {
            case 'trashme':
                $movies = Movie::onlyTrashed()->where('user_id', $user)->orderBy('id', 'DESC')->paginate(4);
            break;
            case 'trashall':
                $movies = Movie::onlyTrashed()->orderBy('id', 'DESC')->paginate(4);
            break;
        }
        return view('movies.trash',compact('movies'));        
    }

    public function restore($movie)
    {
        Movie::onlyTrashed()->find($movie)->restore();
        return redirect()->route('movie_home')->with('status', 'se ha restaurado la pelicula con exito');
    }
}
