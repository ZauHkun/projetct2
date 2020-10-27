@extends('layout.master')
@section('title','add sale record')
@section('content')
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('status'))
    <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <form method="post">
        {{csrf_field()}}
        
        
            <div class="row">               
                <div class="col-md-1 col-sm-1">
                    <div class="form-group">new
                        <input class="form-control custom_checkbox" type="checkbox" style="outline: none;">
                    </div>                    
                </div>
                <!-- normally hide -->
                <div class="col-md-3 col-sm-3">
                    <div style="display: none;" class="form-group new_customer" >customer:
                        <input type="text" disabled name="customer_name" class="form-control new_customer" value="{{old('customer_name')}}" required>
                    </div>

                    <div class="form-group old_customer" >customer:
                        <select name="customer_id" class="form-control old_customer">
                            @foreach($customers as $data)
                            <option value="{{$data->id}}"> {{$data->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">Date *:
                    <input type="date" name="date" class="form-control" value="{{old('date')}}" required>
                    </div>
                </div>
                <!-- normally hide -->
                <div class="col-md-6 col-sm-6">
                    <div class="form-group address" style="display: none;">Address:
                    <input type="text" disabled  name="customer_address" class="form-control address" value="{{old('sale_date')}}">
                    </div>
                </div>    
            </div>
        

        <div class="panel_2">
            <table id="myTable" class="table table-borderless">
                <thead>
                <tr>                    
                    <th>products</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Amt</th>
                    <th><a class=" btn btn-success text-white addrow"><i class="fa fa-plus "></i></a></th>
                </tr>
                </thead>
                <tbody id="tbody">
                    <tr>
                        <td>                                    
                            <select style="width: 200px" name="product_id[]" class="form-control productlist">
                                    <option value="" disabled selected>choose</option>
                                @foreach($products as $data)
                                    <option id="{{$data->id}}" value="{{$data->id}}" >{{$data->name}}</option>                                        
                                @endforeach                                    
                            </select>
                        </td>                        
                        <td>
                            <input type="number"  size="10" name="qty[]" class="form-control qty" value="1">
                            <input type="number" style="display: none;"  name="balance[]" class="form-control balance" >
                            <small style="display: none;border:none; color:red;" class="form-control error">invalid..</small>
                        </td>
                        <td>
                            <input type="text" style="cursor:not-allowed;width:100px"  name="price[]" class="form-control price"  readonly>
                        </td>
                        <td>
                            <input type="text" value="0" size="10" name="discount[]" class="form-control discount">
                        </td>
                        <td>
                            <input type="text"  style="cursor:not-allowed"  name="amount[]" class="form-control amount" readonly>
                        </td>
                        <td>
                            <a href="#" onclick="removeMe(this)" class="btn btn-danger remove">
                                <i class="fa fa-window-close "></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td style="border:none;"></td>
                        <td>Total:</td>
                        <td><b class="total"></b>
                            <div style="display:none;" class="spinner-border text-primary loading" role="status">
                                <span class="sr-only">Loading...</span>                                     
                            </div>
                        </td>
                        <td>
                            <input type="submit" class="btn btn-success btn-save" value="Save">                            
                        </td>
                    </tr>
                </tfoot>
            </table>                
        </div>        
    </form>
@endsection

<script>
    function addrow(){ ///call from master blade
        
        var trow = '<tr>' +
                    '<td> <select style="width:200px;" name="product_id[]" class="form-control productlist" >' +
                    '<option value="" disabled selected>choose</option>' +
                    '@foreach($products as $data)' +
                    '<option class="{{$data->id}}" value="{{$data->id}}">{{$data->name}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</td>' +
                    '<td><input type="number"  size="10" name="qty[]" class="form-control qty" value="1">'+
                        '<input type="number" style="display: none;"  name="balance[]" class="form-control balance">'+
                        '<small style="display: none;border:none; color:red;" class="form-control error">error</small></td>'+
                    '<td><input type="text" style="cursor:not-allowed;width:100px;"  name="price[]" class="form-control price" readonly> </td>' +
                    '<td><input type="text" size="10" value="0" name="discount[]" class="form-control discount"></td>' +
                    '<td> <input type="text"  style="cursor:not-allowed"  name="amount[]" class="form-control amount" readonly> </td>' +
                    '<td><a href="#" onclick="removeMe(this)" class="btn btn-danger remove"> <i class="fa fa-window-close "></i> </a> </td> ' +
                    '</tr>';
                $('tbody').append(trow);
    }
</script>
