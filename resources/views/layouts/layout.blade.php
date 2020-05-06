<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #ffff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .text {
               overflow: hidden;
               text-overflow: ellipsis;
               display: -webkit-box;
               -webkit-line-clamp: 3; /* number of lines to show */
               -webkit-box-orient: vertical;
            }

            .navbar-nav.navbar-center {
                position: absolute;
                left: 50%;
                transform: translatex(-50%);
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
            }
            
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand navbar-dark bg-dark mb-3">
    <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('movies.index') }}">Lista de Películas</a>
            </li>
        </ul>
    </div>
</nav>
<div class="col-sm-12 text-center">

  @if(session()->get('success'))
    <div class="alert alert-success ">
      {{ session()->get('success') }}  
    </div>
  @endif
  @if(session()->get('error'))
    <div class="alert alert-danger ">
      {{ session()->get('error') }}  
    </div>
  @endif

</div>
            @yield('content')
        
        
    </body>


</html>