@extends('dash')

@section('title', 'Classes edit')

@section('body')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Classes edit</h1>
            <div class="col-6">
                <a class="float-end p-2" href="/classes">
                   <img src="https://cdn-icons-png.flaticon.com/32/150/150519.png" style="width:32px;height:32px;">
                </a>
            </div>
        </div>
        <form method="POST" action="{{ route('classes.update') }}">
            @csrf

            <div class="row mb-3">
                <label for="classes" class="col-md-4 col-form-label text-md-end">{{ __('Classes') }}</label>

                <div class="col-md-6">
                    <input id="classes" type="text" class="form-control" name="classes" value="1B" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <label for="teacher" class="col-md-4 col-form-label text-md-end">{{ __('Supervising teacher') }}</label>

                <div class="col-md-3 p-1">
                    <select id="teacher" type="text" class="form-select" name="teacher"  value="" readonly required>
                        <option value disabled selected>teacher</option>
                        @for ($i = 1; $i <= 3; $i++)
                            <option value="{{ $i }}">teacher {{ $i }}</option>
                         @endfor
                    </select>
                </div>
            </div>
            <hr>
            
            <div class="row mb-3">
                <label for="student" class="col-md-4 col-form-label text-md-end">{{ __('Student ') }}</label>
                @for ($y = 0; $y < 5; $y++)
                <div class="col-md-1 p-1">
                    <select id="student" type="text" class="form-select" name="student"  value="" readonly required>
                        <option value disabled selected>student</option>
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="{{ $i }}">Student {{ $i }}</option>
                         @endfor
                    </select>
                </div>
                @endfor
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