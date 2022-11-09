@extends('dash')

@section('body')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hi, {{ Auth::user()->name }}</h1>
      </div>

      @if(Gate::check('isAdmin'))
      <div class="container text-center">
        <div class="row align-items-center">
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <h4>Users</h4>
            <a href="/users"><img src="https://cdn-icons-png.flaticon.com/512/2146/2146937.png" class="main-img p-4"></a>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <h4>Grades</h4>
            <a href="/grades"><img src="https://cdn-icons-png.flaticon.com/512/2228/2228715.png" class="main-img p-4"></a>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <h4>Classes</h4>
            <a href="/classes"><img src="https://cdn-icons-png.flaticon.com/512/943/943271.png" class="main-img p-4"></a>
          </div>
        </div>
      </div>
      @endif

      @if(Gate::check('isTeacher') || Gate::check('isStudent'))
      <div class="container text-center">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <h4>Grades</h4>
            <a href="/grades"><img src="https://cdn-icons-png.flaticon.com/512/2228/2228715.png" class="main-img p-4"></a>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <h4>Classes</h4>
            <a href="/classes"><img src="https://cdn-icons-png.flaticon.com/512/943/943271.png" class="main-img p-4"></a>
          </div>
        </div>
      </div>
      @endif
@endsection     
