<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Opinion;
use Response;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json(Movie::all(), 200);
    }

    public function store(Request $request)
    {
        if (!$request->input('title') || !$request->input('cover') || !$request->input('description'))
        {
            
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para el proceso de alta.'])],422);
        }

        
        $newMovie=Movie::create($request->all());

        
        $response = Response::make(json_encode(['data'=>$newMovie]), 201)->header('Content-Type', 'application/json');
        return $response;
    }

    public function show($id)
    {
        
        $movie=Movie::find($id);

        
        if (!$movie)
        {
            
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
        }

        return response()->json(['status'=>'ok','data'=>$movie],200);
    }

    public function update(Request $request, $id)
    {
        
        $movie=Movie::find($id);

        
        if (!$movie)
        {
            
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una película con ese código.'])],404);
        }       

        
        $title=$request->input('title');
        $cover=$request->input('cover');
        $description=$request->input('description');

        if (!$nombre || !$direccion || !$telefono)
        {
            
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
        }

        $movie->title = $title;
        $movie->cover = $cover;
        $movie->description = $description;

        // Almacenamos en la base de datos el registro.
        $movie->save();
        return response()->json(['status'=>'ok','data'=>$movie], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $movie=Movie::find($id);

        
        if (!$movie)
        {
            
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una película con ese código.'])],404);
        }       

        
        $opinions = $movie->opinions;

        
        if (sizeof($opinions) > 0)
        {
            return response()->json(['code'=>409,'message'=>'Esta película posee comentarios y no puede ser eliminado.'],409);
        }

        
        $movie->delete();

        return response()->json(['code'=>204,'message'=>'Se ha eliminado la película correctamente.']);
    }
}
