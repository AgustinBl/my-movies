<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Opinion;
use Response;

class MovieOpinionController extends Controller
{
    
    public function index($idMovie)
    {
        
        $movie=Movie::find($idMovie);

        if (! $movie)
        {
            
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una película con ese código.'])],404);
        }

        return response()->json($movie->opinions()->get(),200);
    }

    public function store(Request $request, $idMovie)
    {
        
        if ( !$request->input('user') || !$request->input('comment') || !$request->input('rate') )
        {
            
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan datos necesarios para el proceso del comentario.'])],422);
        }

        if ( $request->input('rate') > 10 || $request->input('rate') <= 0 )
            return response()->json(['errors'=>array(['code'=>422,'message'=>'El rating funciona solo en la escala del 1 al 10.'])],422);

        $movie= Movie::find($idMovie);

        
        if (!$movie)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una película con ese código.'])],404);
        }

        $newOpinion=$movie->opinions()->create($request->all());

        $response = Response::make(json_encode(['data'=>$newOpinion]), 201)->header('Content-Type', 'application/json');
        return $response;
    }

    public function show($idMovie, $idOpinion)
    {
        $movie=Movie::find($idMovie);

        if (!$movie)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una película con ese código.'])],404);
        }       

        $opinion = $movie->opinions()->find($idOpinion);

        if (!$opinion)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un comentario con ese código asociado a esa película.'])],404);
        }
        
        return response()->json(['data'=>$opinion], 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $idMovie, $idOpinion)
    {
        $movie=Movie::find($idMovie);

        if (!$movie)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una película con ese código.'])],404);
        }       

        $opinion = $movie->opinions()->find($idOpinion);

        if (!$opinion)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un comentario con ese código asociado a esa película.'])],404);
        }

        $user=$request->input('user');
        $comment=$request->input('comment');
        $rate=$request->input('rate');

        if (!$user || !$comment || !$rate )
        {
           
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Faltan valores para completar el procesamiento.'])],422);
        }

        if ($request->input('rate') > 10 || $request->input('rate') == 10  )
            return response()->json(['errors'=>array(['code'=>422,'message'=>'El rating funciona solo en la escala del 1 al 10.'])],422);   

        $opinion->user = $user;
        $opinion->comment = $comment;
        $opinion->rate = $rate;

        
        $opinion->save();

        return response()->json(['data'=>$opinion], 200);
    }

    public function destroy($idMovie, $idOpinion)
    {
      
        $movie=Movie::find($idMovie);

       
        if (!$movie)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una película con ese código.'])],404);
        }       

        $opinion = $movie->opinions()->find($idOpinion);

        if (!$opinion)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra una opinion con ese código asociado a esa pelicula.'])],404);
        }

        $opinion->delete();

        return response()->json(['code'=>204,'message'=>'Se ha eliminado la opinion correctamente.'],204);
    }
}
