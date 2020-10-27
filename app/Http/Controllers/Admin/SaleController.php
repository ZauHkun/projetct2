<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleInsertFormRequest;
use App\Product;
use App\Sale;
use App\SaleItem;
use App\Stock;
use App\Stockchange;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    
    public function getProductPrice(Request $request){
        
        if($request->get('query')){
            $query=$request->get('query');            

            if($query!=""){
                $product=Product::find($query);
                $stock=Stock::where('product_id',$query)->first();
                if($stock){
                    return json_encode(array($stock->product->price,$stock->balance));                                         
                }else{
                    return "error";
                }               
                
            }
        }else{
            echo "not received";
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sale::where('status',1)->get();
        return view('backend.sale.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $customers=Customer::all();
        $products=Product::where('status',1)->get();
        return view('backend.sale.create',compact('products','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newInvoiceNum(){
        //get last record
        $lastid = Sale::latest()->first();
        $lastInvoiceNum[1]=0;///for first time insert
        if($lastid){
            $lastInvoiceNum = explode('S', $lastid->inv_no);            
        }            
        //increase 1 with last invoice number
        $increment= $lastInvoiceNum[1]+1;            
        
        return date('Ymd')."S".$increment;
    }
    public function calc_Discount($discount,$price){
        $total_order_discount=0;
        if(count($discount)>0){
            foreach($discount as $data=>$v){
                $d=$discount[$data];
                if(strlen($d)>1){
                    if(substr($d,-1)!="%"){ 
                        if(is_numeric($d)==1){ 
                            $total_order_discount+=$d;   
                        }else{ 
                            $total_order_discount+=0; 
                        }     
                    }else{
                        $dis_percent=substr($d,0,-2);
                        if(is_numeric($dis_percent)==1){
                            $pr=$price[$data];
                            $dis_amount=($pr*$dis_percent)/100;
                            $total_order_discount+=$dis_amount;
                        }else{
                            $total_order_discount+=0;
                        }                            
                    }
                }elseif(strlen($d)==1){
                    if(is_numeric($d)==1){
                        $total_order_discount+=$d;
                    }else{
                        $total_order_discount+=0;
                    }                        
                }else{
                    $total_order_discount+=0;
                }
                
            }
        }
        return $total_order_discount;
    }
    public function store(SaleInsertFormRequest $request)
    {        
        $total_price=0;
        $num_of_category=count($request->product_id);
        $total_discount=0;   
        $amount=0;
        $discount=$request->discount;
        $cust_id=0;            
        $arr=$request->product_id;                      
        $error=new MessageBag;
        
        if(count($arr)!=count(array_unique($arr))){
            $error->add('duplicate','choose a product only once to create sale record!. try again');
            return redirect('admin/sale/create')->withErrors($error);
        }else{
            if(count($request->product_id)>0){
                foreach($request->price as $data=>$v){
                    $total_price+=$request->price[$data];                    
                    $amount+=$request->price[$data]*$request->qty[$data];
                }         
                $total_discount=$this->calc_Discount($discount,$request->price);
                if($request->customer_name){
                    $customer_list=[];
                    $customers=Customer::all();
                    foreach($customers as $data){
                        $customer_list[]= $data->name;
                    }
                    if(in_array($request->get('customer_name'),$customer_list)){
                        $error->add('existing','this customer already existed');
                        return redirect('admin/sale/create')->withErrors($error);
                    }else{
                        $cust_id=Customer::create([
                            'name'=>$request->get('customer_name'),
                            'address'=>$request->get('customer_address')
                        ])->id;
                    }
                    
                }else{
                    $cust_id=$request->customer_id;
                }
                
                $sale_id=Sale::create([
                    'inv_no'=>$this->newInvoiceNum(),
                    'customer_id'=>$cust_id,                
                    'date'=>$request->get('date'),
                    'total_amount'=>$amount,
                    'num_of_category'=>$num_of_category,
                    'total_discount'=>$total_discount,
                    'status'=>'1',
                    'action_by'=>Auth::user()->id,
                ])->id;
                
                if($sale_id){
                    foreach($request->product_id as $item=>$v){
                        $data=array( 
                            'sale_id'=>$sale_id,
                            'product_id'=>$request->product_id[$item],
                            'qty'=>$request->qty[$item],                                      
                            'discount'=>$request->discount[$item],
                            'amount'=>$request->amount[$item],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        );
                        $sale_insert=SaleItem::insert($data);
                        //reduce qty from stock table corresponding to product id
                        $stock=Stock::where('product_id',$request->product_id[$item])->first();
                        $stock->balance-=$request->qty[$item];
                        $stock->save();              
                        
                        $data1=array(
                            'product_id'=>$request->product_id[$item],
                            'out'=>$request->qty[$item],
                            'date'=>Carbon::now(),
                        );
                        Stockchange::insert($data1);
                    }
                    if($sale_insert){
                        return redirect('admin/sale/create')->with('status', 'Success');  
                    }else{
                        return redirect('admin/sale/create')->with('status', 'Failed. Try again.');  
                    }
                    
                }else{
                    return redirect('admin/sale/create')->with('status', 'Operation Failed! Try again.');  
                }            
            }    //end counting product request
        }//end duplicating check
            
                
    }//end method

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $sale=Sale::find($id);
        return view('backend.sale.invoice',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
