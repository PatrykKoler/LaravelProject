@extends('dash')

@section('title', 'Classes edit')

@section('body')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Classes edit</h1>
            <div class="col-6">
                <a class="float-end p-2" href="{{route('classes.create')}}">
                   <img src="https://cdn-icons-png.flaticon.com/32/1387/1387940.png" style="width:32px;height:32px;">
                </a>
                <a class="float-end p-2" href="/classes">
                   <img src="https://cdn-icons-png.flaticon.com/32/150/150519.png" style="width:32px;height:32px;">
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('classes.update', $classes[0]->id) }}">
            @csrf

            <div class="row mb-3">
                <label for="classes" class="col-md-4 col-form-label text-md-end">{{ __('Classes') }}</label>

                <div class="col-md-6">
                    <input id="class_name" type="text" class="form-control" name="class_name" value="{{$classes[0]->class_name}}" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="teacher" class="col-md-4 col-form-label text-md-end">{{ __('Supervising teacher') }}</label>

                <div class="col-md-3 p-1">
                    <select id="user_id" type="text" class="form-select" name="user_id" value="{{$classes[0]->teacher}}" readonly required>
                        <option disabled>teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}"@if($classes[0]->teacher == $teacher->name) selected @endif>{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <div class="container">    
            <div class="row mb-3 p-1">
            <table class="table table-hover align-middle"> 
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Student Name</th>
                    <th scope="col"><span class="float-end">Action</span></th>
                </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
                <tr>
                    <td scope="row">1</td>
                    <td>{{$student->name}}</td>
                    @if(Gate::check('isAdmin'))
                    <td>
                        <button class="btn btn-sm delete float-end" data-id="{{$student->id}}"><img src="https://cdn-icons-png.flaticon.com/32/748/748138.png" style="width:32px;height:32px;"></button>
                    </td>
                    @endif
                </tr>  
              @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection
@section('javascript')
$(document).ready(function () {
    $('.delete').click(function() {
        $.ajax({
            type: 'DELETE',
            url: "./delete/" + $(this).data("id")
        })
        .done(function(response) {
            window.location.reload();
        })
        .fail(function (response) {
            alert("ERROR");
        });
    });
});
@endsection 