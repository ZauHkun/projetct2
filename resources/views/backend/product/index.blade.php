@extends('layout.master')
@section('title','products')

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="card">
        <div class="card-header">
            Product list
        </div>
        <div class="card-body">
            <table id="data_table" class="table table-borderless">
                <thead>
                    <th>name</th>
                    <th>package</th>
                    <th>price</th>
                    <th>foc</th>
                    <th>action</th>
                </thead>
                <tbody>
                    @foreach($products as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->package->name}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->foc->name}}</td>
                        <td> 
                            <a class="btn btn-sm btn-success" href="{{action('admin\ProductController@edit',$data->id)}}">
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
@endsection()