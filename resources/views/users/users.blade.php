@extends('dash')

@section('title', 'Users')

@section('body')
    
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="col-6">
                <a class="float-end p-2" href="users/register">
                   <img src="https://cdn-icons-png.flaticon.com/32/1387/1387940.png" style="width:32px;height:32px;">
                </a>
            </div>
        </div>
    <div class="container">
        <div class="row">
        <table class="table table-hover align-middle"> 
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
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
                        <button class="btn btn-sm" onclick="window.location.href='{{ route('users.edit', $user->id) }}';"><img src="https://cdn-icons-png.flaticon.com/32/650/650143.png" style="width:32px;height:32px;"></button>

                        <button class="btn btn-sm delete" data-id="{{$user->id}}"><img src="https://cdn-icons-png.flaticon.com/32/748/748138.png" style="width:32px;height:32px;"></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>   
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users archive</h1>
        </div>
        <div class="container">
            <div class="row">
            <table class="table table-hover table-dark table-striped align-middle"> 
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($usersDelete as $userdelete)
                    <tr>
                        <td scope="row">{{$userdelete->id}}</td>
                        <td>{{$userdelete->name}} </td>
                        <td>{{$userdelete->email}}</td>
                        <td>{{$userdelete->role}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div> 
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