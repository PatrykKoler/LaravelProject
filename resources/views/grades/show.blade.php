@extends('dash')

@section('title', 'Grades')

@section('body')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Grades</h1>
          
          <button class="btn btn-sm float-end" onclick="window.location.href='/grades/add';"><img src="https://cdn-icons-png.flaticon.com/512/1237/1237946.png" style="width:32px;height:32px;"></button>
      </div>

      <div class="container">
        <div class="row">
        <table class="table table-hover align-middle text-center"> 
            <thead>
                <tr>
                    <th scope="col">Grades</th>
                    @if(Gate::check('isAdmin') || Gate::check('isTeacher'))
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach($grades as $grade)
                    <tr>
                        <td>{{$grade->note}}</td>
                    @if(Gate::check('isAdmin') || Gate::check('isTeacher'))
                    <td>
                      <button class="btn btn-sm" onclick="window.location.href='{{route('grades.edit', $grade->id)}}';"><img src="https://cdn-icons-png.flaticon.com/32/650/650143.png" style="width:32px;height:32px;"></button>
                    </td>
                    @endif
                </tr> 
            @endforeach    
            </tbody>
        </table>
        </div>
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
