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
                    @if(Gate::check('isAdmin'))
                      <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
              @foreach($classes as $class)
                <tr>
                    <td scope="row">{{$class->class_name}}</td>
                    <td>{{$class->teacher}}</td>
                    @if(Gate::check('isAdmin'))
                    <td>
                      <button class="btn btn-sm" onclick="window.location.href='{{ route('classes.edit', $class->id) }}'"><img src="https://cdn-icons-png.flaticon.com/32/650/650143.png" style="width:32px;height:32px;"></button>
                    </td>
                    @endif
                </tr>  
              @endforeach
            </tbody>
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
