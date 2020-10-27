@extends('layout.master')

@section('title','invoice')

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
                <h3 style="text-align: center;">Business Name</h3>
                <h4>invoices</h4>
            </div>
            
            <div class="card-body">
            <div id="inv">                
                <div id="inv-my-address" class="row"> 
                    <div class="col-md-4 col-sm-4" style="text-align: left;">
                        <h6>{{$sale->customer->name}}</h6>
                        <h6>{{$sale->customer->phone}}, {{$sale->customer->address}}</h6>
                        
                    </div>
                    <div class="col-md-4 col-sm-4" >
                        <!-- Left a space between two divs -->
                    </div>
                    <div class="col-md-4 col-sm-4" style="text-align: right;">
                        <h6>Invoice No : {{$sale->inv_no}}</h6>
                        <h6>Date : {{$sale->date}}		</h6>
                        
                    </div>
                </div>
                
                
                <div>
                    <table class="table table-hover">
                        <tr>
                            <thead class="bg-secondary" style="text-align: center;">
                                <th width="10">No</th>                                
                                <th width="40%">Contents</th>
                                <th>Qty</th>
                                <th>Foc</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </thead>
                        </tr>			
                        <tbody class="inv-row">
                        @section('someSection')
                            {{ $counter = 1 }}
                        @endsection

                        @foreach($sale->sale_items as $data)
                        <tr>
                            <td width="10" style="text-align: right;padding-right: 15px;">{{$counter}}</td>                            
                            <td width="40%" style="text-align: center;">{{$data->product->name}}</td>
                            <td style="text-align: center;">{{$data->qty}}</td>
                            <td style="text-align: center;">{{$data->foc}}</td>
                            <td style="text-align: center;">{{$data->product->price}}</td>
                            <td style="text-align: center;">{{$data->amount}}</td>
                        </tr>
                        @section('someSection')
                            {{ $counter ++ }}
                        @endsection

                        @endforeach
                        @for($i=$counter; $i < 10 ; $i++)                     
                        <tr>
                            <td width="10" style="text-align: right;padding-right: 15px;">
                            
                            </td>                            
                            <td width="40%"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endfor
                        <tr  >
                            <td style="border-bottom: 3px solid #fff;border-left: 3px solid #fff;" rowspan="4" colspan="4" >
                                <div class="row">
                                    <div class="col-md-6 col-sm-6" style="text-align: center; margin-top: 80px;">
                                        Customer
                                    </div>
                                    <div class="col-md-6 col-sm-6" style="text-align: center; margin-top: 80px;">Inspector
                                    </div>                                    
                                </div>
                            </td>
                            <td class="border-hide">Subtotal :</td>
                            <td style="text-align: center;" height="15">
                            {{$sale->total_amount}}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-hide">Discount :</td>
                            <td style="text-align: center;">
                            	{{$sale->total_discount}}
                            </td>
                        </tr>
                       
                        <tr>
                            <td class="border-hide">Total :</td>
                            <td style="text-align: center;">
                               {{$sale->total_amount - $sale->total_discount}}
                            </td>
                        </tr>
                        </tbody>
                        
                    </table>		
                </div>                
            </div>
        </div>
        </div>
    </div>
</div>    <br>

@endsection