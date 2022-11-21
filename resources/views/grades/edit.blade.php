@extends('dash')

@section('title', 'Grades edit')

@section('body')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Grades edit</h1>
            <div class="col-6">
                <a class="float-end p-2" href="/grades">
                   <img src="https://cdn-icons-png.flaticon.com/32/150/150519.png" style="width:32px;height:32px;">
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('grades.update', $grade[0]->id) }}">
            @csrf

            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('School subject') }}</label>

                <div class="col-md-6">
                    <input id="subject" type="text" class="form-control" name="school_subject_id" value="{{$grade[0]->school_subject}}" readonly disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="classes" class="col-md-4 col-form-label text-md-end">{{ __('Classes') }}</label>

                <div class="col-md-6">
                    <input id="classes" type="text" class="form-control" name="teacher_classes_id" value="{{$grade[0]->classes}}" readonly disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="student" class="col-md-4 col-form-label text-md-end">{{ __('Student') }}</label>

                <div class="col-md-6">
                    <input id="student" type="text" class="form-control" name="user_id" value="{{$grade[0]->student}}"  readonly disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="grades" class="col-md-4 col-form-label text-md-end">{{ __('Grades') }}</label>
                    <div class="col-md-1 p-1">
                        <select id="grades" type="text" class="form-select" name="note" value="{{$grade[0]->note}}" autocomplete="grades">
                            <option value disabled>Grade</option>
                            <option value="1" @if($grade[0]->note == 1) selected @endif>1</option>
                            <option value="2" @if($grade[0]->note == 2) selected @endif>2</option>
                            <option value="3" @if($grade[0]->note == 3) selected @endif>3</option>
                            <option value="4" @if($grade[0]->note == 4) selected @endif>4</option>
                            <option value="5" @if($grade[0]->note == 5) selected @endif>5</option>
                            <option value="6" @if($grade[0]->note == 6) selected @endif>6</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
@endsection  