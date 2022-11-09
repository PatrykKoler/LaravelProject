@extends('dash')

@section('grades')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Grades</h1>
      </div>

      @if(Gate::check('isAdmin'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO edycja ocen | nowa, zmiana, usuniecie
        </div>
      </div>
      @endif

      @if(Gate::check('isTeacher'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO edycja ocen | nowa, zmiana
        </div>
      </div>
      @endif

      @if(Gate::check('isStudent'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO wglad do swoich ocen
        </div>
      </div>
      @endif
@endsection  
