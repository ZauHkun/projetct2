@extends('layout.master')

@section('title','refill stock')

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
                <h3>refill stock</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    <h2>
                        {{$stock->product->name}}
                        <small> 
                            {{$stock->product->cat->name}} 
                            {{$stock->product->cat->form->name}} 
                        </small>
                    </h2>
                    
                    <div class="form-group">
                        <input name="product_id" value="{{$stock->id}}" type="hidden">
                        product quantity : <input class="form-control" type="number" name="qty" value="{{old('qty')}}">
                    </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"> add</i></button>
                        <a href="{{url('admin/stock')}}" class="btn btn-warning">back</a>
                </form>
            </div>
        </div>
    </div>
</div>    

@endsection