@extends('layout.master')

@section('title','new customer')

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
                <h3>add new customer</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}                    
                    <div class="form-group">   
                        Customer Name:                    
                        <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}">              
                    </div>    
                    <div class="form-group">     
                        Phone:                  
                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}" >              
                    </div> 
                    <div class="form-group">   
                        Address:                    
                        <input type="text" class="form-control" name="address" value="{{old('address')}}">              
                    </div>                 
                    
                    <button type="submit" class="btn btn-success float-right">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>    

@endsection