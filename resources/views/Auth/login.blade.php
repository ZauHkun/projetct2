@extends('layout.master')

@section('title','Login')

@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">        
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach

        <div class="card">
            <div class="card-header">
                <h3>User Login</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}                    
                    <div class="form-group">
                        <label for="email">Email :</label>                        
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}"  placeholder="Enter an email">              
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control" name="password" id="password1" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fas fa-sign-in-alt"></i> login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection