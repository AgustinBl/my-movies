<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Opinion;

class WebController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
            return view('Movie.index', compact('movies')); 
    }

    public function create()
    {
        return view('Movie.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[ 'title'=>'required', 'cover'=>'required', 'description'=>'required']);
        Movie::create($request->all());
        return redirect()->route('movies.index')->with('success','Película creada satisfactoriamente');
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        
          if( $movie->opinions->isEmpty())
        	{
		        $movie->delete();
		        return redirect('/movies')->with('success', 'Película borrada!');
    		}

        return redirect('/movies')->with('error', 'Posee comentarios, no se puede borrar!');;
    } 

    public function show(Movie $movie)
    {
        $opinions = $movie->opinions;
        return view('Movie.show',compact('movie','opinions'));
    }
    
}
