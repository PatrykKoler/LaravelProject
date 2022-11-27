@extends('dash')

@section('title', 'Grades')

@section('body')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Grades</h1>
      </div>

      <div class="container">
        <div class="row">
        <table class="table table-hover align-middle"> 
            <thead>
                <tr>
                    <th scope="col">Classes</th>
                    <th scope="col">School subject</th>
                    <th scope="col">Students</th>
                    @if(Gate::check('isAdmin') || Gate::check('isTeacher'))
                      <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td scope="row">{{$grade->class_name}}</td>
                    <td>{{$grade->school_subject}}</td>
                    <td>{{$grade->student}}</td>
                    @if(Gate::check('isAdmin') || Gate::check('isTeacher'))
                    <td>
                      <button class="btn btn-sm" onclick="window.location.href='{{ route('grades.show', $grade->id) }}';"><img src="https://cdn-icons-png.flaticon.com/32/650/650143.png" style="width:32px;height:32px;"></button>
                      
                    </td>
                    @endif
                </tr>     
            </tbody>
            @endforeach
        </table>
        </div>
    </div> 
@endsection  
