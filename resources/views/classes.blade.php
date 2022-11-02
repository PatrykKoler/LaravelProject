@extends('dash')

@section('classes')
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
@endsection   
