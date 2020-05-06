<?php

namespace App\Http\Controllers;

use App\Opinion;
use App\Movie;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Opinion::all(), 200);
    }

    public function show($id)
    {
        $opinion=Opinion::find($id);

        if (!$opinion)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un comentario con ese código.'])],404);
        }

        return response()->json(['status'=>'ok','data'=>$opinion],200);
    }

}
