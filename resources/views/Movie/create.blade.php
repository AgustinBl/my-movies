@extends('layouts.layout')
@section('content')

  <section class="content ">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-info">
        {{Session::get('success')}}
      </div>
      @endif

  
 
      <div class="panel panel-default p-5 border ">
        <div class="panel-heading ">
          <h3 class="panel-title mb-5">Nueva Película</h3>
        </div>
        <div class="panel-body">          
          <div class="table-container">
            <form method="POST" action="{{ route('movies.store') }}"  role="form">
              {{ csrf_field() }}
              <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-3 ">
                  <div class="form-group">
                    <input type="text" name="title" id="title" class="form-control input-sm" placeholder="Título">
                  </div>
                </div>
              </div>
                <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-3">
                  <div class="form-group">
                    <input type="text" name="cover" id="cover" class="form-control input-sm" placeholder="Cover">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-5">
              <div class="form-group">
                <textarea name="description" class="form-control input-sm" placeholder="Descripción"></textarea>
              </div>
            </div>
          </div>
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-5">
                  <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                  <a href="{{ route('movies.index') }}" class="btn btn-info btn-block" >Atrás</a>
                </div>  
 
              </div>
            </form>
          </div>
        </div>



  </section>
  @endsection