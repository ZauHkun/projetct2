@extends('layout.master')
@section('title','Create Product')
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
                add new product
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Product Name :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <input type="text" class="form-control" value="{{old('product_name')}}" name="product_name">
                        </div>                                               
                    </div>      
                    <br>              
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Category Name :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select name="cat_id" class="form-control">
                                @foreach($categories as $data)
                                    <option value="{{$data->id}}"> {{$data->name}} </option>
                                @endforeach
                            </select>
                        </div>                                               
                    </div>           
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Price (mmk) :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <input type="number" class="form-control" value="{{old('price')}}" name="price">
                        </div>                                               
                    </div>      
                    <br>             
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Package Size :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select name="package_id" class="form-control">
                                @foreach($packages as $data)
                                    <option value="{{$data->id}}"> {{$data->name}} </option>
                                @endforeach 
                            </select>
                        </div>                                               
                    </div>           
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Foc rate :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select name="foc_id" class="form-control">
                                @foreach($focs as $data)
                                    <option value="{{$data->id}}"> {{$data->name}} </option>
                                @endforeach
                            </select>
                        </div>                                               
                    </div>           
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Description :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <textarea name="descripion" class="form-control" cols="30" rows="1">
                            {{old('description')}}
                            </textarea>
                        </div>                                               
                    </div>                               
                    <br>
                    <!-- <div class="row">
                        <div class="col-md-3 col-sm-3">
                            Photo :
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <input type="file" name="photo" >
                        </div>                                               
                    </div>           
                    <br> -->
                    <button type="submit" class="btn btn-success float-right">Save</button>
                </form>
            </div>
        </div><br>        
    </div>
</div>
@endsection