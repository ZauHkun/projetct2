<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StockInsertRequest;
use App\Http\Requests\StockRefillRequest;
use App\Product;
use App\Stock;
use App\Stockchange;
use Carbon\Carbon;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks=Stock::all();
        return view('backend.stock.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('backend.stock.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refill($id)
    {
        $stock=Stock::whereId($id)->firstOrFail();
        return view('backend.stock.refill',compact('stock'));
    }
    public function refilled(StockRefillRequest $request,$id){
        $stock=Stock::whereId($id)->firstOrFail();
        $stock->balance=(Int)$stock->balance+ (Int)$request->get('qty');
        $stock->update();

        Stockchange::create([
            'product_id'=>$stock->product_id,
            'in'=>$request->get('qty'),
            'date'=>Carbon::now(),
        ]);
        return redirect(action('admin\StockController@refill',$id))->with('status','success to refill');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
