@extends('layout.master')

@section('title','Sale records')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Sale List</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-borderless">
                    <thead>
                        <th>Invoice</th>
                        <th>Customer</th>                        
                        <th>Product</th>
                        <th>Amount</th>  
                        <th>Date</th>                      
                    </thead>
                    <tbody>
                    @foreach($sales as $data)
                       <tr>                       
                           <td>
                               <a href="{{action('admin\SaleController@invoice',$data->id)}}">
                                    {{$data->inv_no}}
                               </a>
                            </td>

                           <td>{{$data->customer->name}}</td>
                           <td>
                               @foreach($data->sale_items as $data1)
                                    <small>
                                        {{$data1->product->name}},
                                    </small>
                               @endforeach
                           </td>
                           <td>{{$data->total_amount-$data->total_discount}}</td>                              
                           <td>{{$data->date}}</td>                    
                       </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection