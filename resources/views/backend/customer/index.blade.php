@extends('layout.master')

@section('title','customers')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Customer List</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-borderless">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>                        
                        <th>Phone</th>
                        <th>Address</th>
                        <th>option</th>
                    </thead>
                    <tbody>
                        @foreach($customers as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>                            
                            <td>{{$data->phone}}</td>  
                            <td>{{$data->address}}</td>  
                            <td>
                                <a class="btn btn-info btn-sm" href="{{action('admin\CustomerController@edit',$data->id)}}">
                                    edit
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