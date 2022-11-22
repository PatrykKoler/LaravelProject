@extends('dash')

@section('title', 'Add grade')

@section('body')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add grade</h1>
            <div class="col-6">
                <a class="float-end p-2" href="/grades">
                   <img src="https://cdn-icons-png.flaticon.com/32/150/150519.png" style="width:32px;height:32px;">
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('grades.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('School subject') }}</label>

                <div class="col-md-6">
                    <input id="school_subject" type="text" class="form-control" name="school_subject" value="{{$student[0]->school_subject}}" disabled>
                    <input id="school_subject_id" type="text"  class="form-control" name="school_subject_id" value="{{$student[0]->school_subject_id}}" hidden>
                </div>
            </div>

            <div class="row mb-3">
                <label for="classes" class="col-md-4 col-form-label text-md-end">{{ __('Classes') }}</label>

                <div class="col-md-6">
                    <input id="class_name" type="text" class="form-control" name="class_name" value="{{$student[0]->class_name}}" disabled>
                    <input id="teacher_classes_id" type="text" class="form-control" name="teacher_classes_id" value="{{$student[0]->teacher_classes_id}}" hidden>
                </div>
            </div>

            <div class="row mb-3">
                <label for="student" class="col-md-4 col-form-label text-md-end">{{ __('Student') }}</label>

                <div class="col-md-6">
                    <input id="student" type="text" class="form-control" name="student" value="{{$student[0]->student}}" disabled>
                    <input id="user_id" type="text" class="form-control" name="user_id" value="{{$student[0]->user_id}}" hidden>
                </div>
            </div>
            <div class="row mb-1">
                <label for="grades" class="col-md-4 col-form-label text-md-end">{{ __('Grades') }}</label>
                <div class="col-md-1 p-1">
                    <select id="note" type="text" class="form-select @error('note') is-invalid @enderror" name="note" required>
                        <option value disabled selected>Grade</option>
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
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