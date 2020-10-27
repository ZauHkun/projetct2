@extends('layout.master')
@section('title','register')
@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach

        <div class="card">
            <div class="card-header">
                <h3>Register Here</h3>               
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"  placeholder="Enter a name">              
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}"  placeholder="Enter an email">              
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control" name="password" id="password1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password :</label>
                        <input type="password" class="form-control" name="password_confirmation" id="confirm_password1" placeholder="confirm your password">
                    </div>                
                    <button type="submit" class="btn btn-primary float-right">register</button>
                </form>
            </div>
        </div>    
    </div>
</div>    
@endsection