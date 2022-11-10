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
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('School subject') }}</label>

                <div class="col-md-6">
                    <input id="subject" type="text" class="form-control" name="subject" value="History" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="classes" class="col-md-4 col-form-label text-md-end">{{ __('Classes') }}</label>

                <div class="col-md-6">
                    <input id="classes" type="text" class="form-control" name="classes" value="1B" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="student" class="col-md-4 col-form-label text-md-end">{{ __('Student') }}</label>

                <div class="col-md-6">
                    <input id="student" type="text" class="form-control" name="student" value="Student 1" disabled>
                </div>
            </div>

            <div class="row mb-1">
                <label for="grades" class="col-md-4 col-form-label text-md-end">{{ __('Grades') }}</label>
                <div class="col-md-1 p-1">
                    <select id="grades" type="text" class="form-select" name="grades"  value="" readonly required>
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