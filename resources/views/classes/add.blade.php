@extends('dash')

@section('title', 'Classes Add')

@section('body')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Classes Add</h1>
            <div class="col-6">
                <a class="float-end p-2" href="/classes">
                   <img src="https://cdn-icons-png.flaticon.com/32/150/150519.png" style="width:32px;height:32px;">
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('classes.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="classes" class="col-md-4 col-form-label text-md-end">{{ __('Classes') }}</label>

                <div class="col-md-6">
                    <input id="classes" type="text" class="form-control" name="class" value="{{$class[0]->class_name}}" disabled>
                    <input id="teacher_classes_id" type="text" class="form-control" name="teacher_classes_id" value="{{$class[0]->id}}" hidden>
                </div>
            </div>
            <div class="row mb-3">
                <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('Student') }}</label>

                <div class="col-md-3 p-1">
                    <select id="user_id" type="text" class="form-select" name="user_id" value="{{$students[0]->name}}" readonly required>
                        <option disabled selected>student</option>
                        @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
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
    </div>
@endsection  