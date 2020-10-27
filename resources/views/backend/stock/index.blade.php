@extends('layout.master')

@section('title','stock')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Stock Balance</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-borderless">
                    <thead>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Balance</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        @foreach($stocks as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->product->name}}</td>
                            <td>{{$data->balance}}</td>
                            <td>
                                <a href="{{action('admin\StockController@refill',$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> refill</a>
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