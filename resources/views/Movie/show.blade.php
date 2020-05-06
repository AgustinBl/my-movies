@extends('layouts.layout')
@section('content')

<div class="container-fluid">
<div class="row ">
<div class="col ">    
    <div class="card" style="width: 58rem; ">
  <img class="card-img-top " src="{{$movie->cover}}" style="height: 300px; " alt="Card image cap">
  <div class="card-body">
    <h1 class="card-title text-center">{{$movie->title}}</h1>
    <p class="card-text">{{$movie->description}}</p>
    <a class="btn btn-primary float-left" href="{{ route('movies.index') }}"> Atrás</a>
  </div>
</div>
</div>

<div class="col">
  <div class="row-1">
@foreach($opinions as $opinion)
<div class="col pb-3">
    <div class="card text-white bg-dark " style="max-width: 100rem;">
  <div class="card-header text-center">{{$opinion->user}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$opinion->rate}}/10</h5>
    <p class="card-text">{{$opinion->comment}}</p>
  </div>
</div>
</div>

@endforeach
</div>
</div>
</div>
</div>
@endsection