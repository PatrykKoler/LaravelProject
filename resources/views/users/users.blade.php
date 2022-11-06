@extends('dash')
@section('users')
    <div class="container">
        <table class="table table-hover"> 
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rola</th>
                    <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{$user->id}}</td>
                    <td>{{$user->name}} </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection 