@extends('layout.master')

@section('title','stock')

@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">        
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach

        @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>edit stock</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <select name="product_id" id="" class="form-control">
                            @foreach($stocks as $data)
                            <option value="{{$data->id}}"
                            @if($data->id == $product->id)    
                            > {{$data->product->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <label for="role">Role Name :</label> -->
                        <input type="number" class="form-control" name="qty" value="{{$product->qty}}">              
                    </div>                    
                    
                    <button type="submit" class="btn btn-success float-right">update</button>
                </form>
            </div>
        </div>
    </div>
</div>    

@endsection