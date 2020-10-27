@extends('layout.master')

@section('title','All Roles')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>User Role List</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-borderless">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        
                    </thead>
                    <tbody>
                        @foreach($roles as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection