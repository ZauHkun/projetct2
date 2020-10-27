@extends('layout.master')

@section('title','All users')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Backend User List</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-borderless">
                    <thead style="text-align: center;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>permission</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles()->pluck('name')->implode(' ')}}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{action('admin\UserController@edit_permit',$user->id)}}">
                                    change
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection