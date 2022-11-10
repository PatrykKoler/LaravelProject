@extends('dash')

@section('title', 'Classes')

@section('body')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Classes</h1>
      </div>

      <div class="container">
        <div class="row">
        <table class="table table-hover align-middle"> 
            <thead>
                <tr>
                    <th scope="col">Class</th>
                    <th scope="col">Supervising teacher</th>
                    <th rowspan="3" scope="col">Students</th><!-- rowspan tyle ile uczniow w klasie -->
                    @if(Gate::check('isAdmin'))
                      <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            @for ($i = 0; $i < 5; $i++)
            <tbody>
                <tr>
                    <td scope="row">{{ $i }}B</td>
                    <td>Teacher {{ $i }}</td>
                    <td rowspan="0">student {{ $i }}<br>student {{ $i+1 }}<br>student {{ $i+2 }}</td><!-- rowspan tyle ile uczniow w klasie -->
                    @if(Gate::check('isAdmin'))
                    <td>
                      <button class="btn btn-sm" onclick=""><img src="https://cdn-icons-png.flaticon.com/32/650/650143.png" style="width:32px;height:32px;"></button>
                    </td>
                    @endif
                </tr>   
            </tbody>
            @endfor 
        </table>
        </div>
    </div> 

      #TODO modyfikacja routingu do classes/edit

      @if(Gate::check('isAdmin'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO edycja wychowawcy, uczniów, nazwy klasy
        </div>
      </div>
      @endif

      @if(Gate::check('isTeacher') || Gate::check('isStudent'))
      <div class="container text-center">
        <div class="row align-items-center">
          #TODO podglad do swojej klasy / nauczyciel jako wychowawca tej klasy
        </div>
      </div>
      @endif

@endsection   
