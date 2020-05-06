@extends('layouts.layout')
@section('content')

  <section class="content">
          
            <div class="btn-group">
              <a href="{{ route('movies.create') }}" class="btn btn-info mb-3" >Añadir Película</a>
            </div>

              <div class="card-group justify-content-center">
              @if($movies->count())  
              @foreach($movies as $movie)
                <div class="row col-sm-12 col-md-6 col-lg-3 " >    
                  <div class="card" style="width: 30rem;" >
                    <img src="{{$movie->cover}}" class="card-img-top " style="height: 300px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text text">{{ $movie->description }}.</p>

                        <div class="text-center">

                        <form action="{{ route('movies.destroy', $movie->id)}}" method="POST">
                        
                        
                        <a class="btn btn-ifo float-right" href="{{ route('movies.show',$movie->id) }}" >Ver mas..</a>

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger float-left" >Borrar</button>

                        </form>


                       
                        </div>
                    </div>
                  </div>
                </div>
               @endforeach 
             </div>
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

        
</section>

@endsection
