@extends('layout.master')

@section('title','Edit Category')

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
                <h3>Edit Category's Information</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" value="{{$category->name}}" name="category_name" id="name" >              
                    </div>
                    <div class="form-group">
                        <select name="form_id" class="form-control">
                            @foreach($forms as $data)                            
                                <option value="{{$data->id}}"  
                                    @if($category->form_id == $data->id) selected="selected"
                                    @endif > {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{url('admin/category')}}" type="button"  class="btn btn-danger">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection