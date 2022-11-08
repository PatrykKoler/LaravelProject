@extends('dash')
@section('users')
    <div class="container">
        <a href="users/register">
            <button type="button" class="btn btn-primary btn-lg btn-block">Dodaj użytkownika</button>
        </a>
        <h1 class="h1">Lista użytkowników</h1>
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
                    <td>
                        <button class="btn btn-danger btn-sm delete" data-id="{{$user->id}}">
                            X
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h1 class="h1">Archiwum</h1>
        <table class="table"> 
            <thead>
                <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rola</th>
                </tr>
            </thead>
            <tbody>
            @foreach($usersDelete as $userdelete)
                <tr class="table-dark">
                    <td scope="row">{{$userdelete->id}}</td>
                    <td>{{$userdelete->name}} </td>
                    <td>{{$userdelete->email}}</td>
                    <td>{{$userdelete->role}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection 
@section('javascript')
$(document).ready(function () {
    $('.delete').click(function() {
        $.ajax({
            type: 'DELETE',
            url: "./users/" + $(this).data("id")
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