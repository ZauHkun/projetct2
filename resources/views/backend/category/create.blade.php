@extends('layout.master')

@section('title','Create Category')

@section('content')
<div class="container"><br>
    <div class="col-md-10 offset-md-1">
        
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach

        @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add Category</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="role">Category Name :</label>
                        <input type="text" class="form-control" name="category_name" value="{{old('category_name')}}">              
                    </div>                    
                    <div class="form-group">
                        <select name="form_id" id="" class="form-control">
                            @foreach($forms as $data)
                                <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success ">Insert</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection