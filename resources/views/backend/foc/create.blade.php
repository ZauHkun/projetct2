@extends('layout.master')

@section('title','Create foc')

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
                <h3>Insert a foc</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}                    
                    <div class="form-group">                       
                        <input type="text" class="form-control" name="foc_name" value="{{old('foc_name')}}"  placeholder="foc name here">              
                    </div>                    
                    
                    <button type="submit" class="btn btn-success float-right">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>    

@endsection