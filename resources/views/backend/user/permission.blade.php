@extends('layout.master')

@section('title','Edit User')

@section('content')
<div class="container">
    <br>
    <div class="col-md-10 offset-md-1">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        @if(session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit User's Information</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" disabled style="cursor: not-allowed;" class="form-control" value="{{$user->name}}" name="name" id="name" >              
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" disabled style="cursor: not-allowed;" class="form-control" name="email" value="{{$user->email}}" id="email">
                    </div>

                    <div class="form-group">
                        Roles:
                        <select name="role[]" multiple class="form-control">
                            @foreach($roles as $data)

                            <option value="{{$data->name}}"
                                @if(in_array($data->name,$selectedRole))
                                    selected="selected"
                                @endif
                            >{{$data->name}}</option>

                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{url('admin/user')}}" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection