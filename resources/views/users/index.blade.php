@extends('layouts.app')
@section('content')

@if (auth()->user()->role == 1)
    <a href="{{route('create-admin-user')}}" class="btn btn-primary btn-pill my-5">Add User</a>
@elseif (auth()->user()->role == 2)
    <a href="/employee/users/create" class="btn btn-primary btn-pill my-5">Add User</a>
@else
    <a href="/customer/users/create" class="btn btn-primary btn-pill my-5">Add User</a>
@endif
<table id="usersTable" class="table table-hover table-product" style="width:100%">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Sex</th>
        <th>Birth Date</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    @if (count($users) > 0 )
        @foreach ($users as $user)
            <tr>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{($user->sex == '1') ? "Male" : "Female"}}</td>
                <td>{{$user->birthdate}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->role == 1)
                        {{"Administrator"}}
                    @elseif($user->role == 2)
                        {{"Employee"}}
                    @else
                        {{"Customer"}}
                    @endif
                </td>
                <td>
                    <a href="/admin/users/show/{{$user->id}}"><i class="mdi mdi-lead-pencil text-success"></i></a>
                    <form action="/admin/users/{{$user->id}}" method="POST" class="d-inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit"><i class="mdi mdi-delete text-danger"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
  </table>
@endsection
