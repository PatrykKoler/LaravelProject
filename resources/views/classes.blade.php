<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/167/167707.png">
    <meta name="theme-color" content="#7952b3">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      img{
        width: 35%;
        height: 35%;
        cursor: pointer;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/dashboard/dashboard.css" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>

  </head>
  <body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">Gradebook</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <span class="w-100" type="text"></span>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Sign out</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>              
        </div>
      </div>
    </header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="./">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          @if(Gate::check('isAdmin'))
          <li class="nav-item">
            <a class="nav-link" href="./register">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
          @endif
          @if(Gate::check('isAdmin') || Gate::check('isTeacher') || Gate::check('isStudent'))
          <li class="nav-item">
            <a class="nav-link" href="./grades">
              <span data-feather="grades"></span>
              Grades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./classes">
              <span data-feather="classes"></span>
              Classes
            </a>
          </li>
          @endif
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Classes</h1>
      </div>

      @if(Gate::check('isAdmin'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO edycja przydziału do klas | modyfikacja uczniów oraz nauczycieli
        </div>
      </div>
      @endif

      @if(Gate::check('isTeacher'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO edycja przydziału do klas | modyfikacja uczniów swojej klasy
        </div>
      </div>
      @endif

      @if(Gate::check('isStudent'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO widok swojej klasy | kto jest wychowawcą oraz kto jest z nim w klasie
        </div>
      </div>
      @endif

    </main>
    
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>