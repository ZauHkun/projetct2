<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Foc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductInsertFormRequest;
use App\Http\Requests\ProductUpdateFormRequest;
use App\Package;
use App\Product;
use App\Stock;
use App\Stockchange;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Null_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $focs=Foc::all();
        $packages=Package::all();
        if(count($focs)>0 && count($packages)>0){            
            return view('backend.product.create',compact('categories','focs','packages'));
        }else{
            $arr1=array('5+1','10+1','10+2','20+1');

            for($i=0;$i<count($arr1);$i++){
                $data=array(
                    'name'=>$arr1[$i],
                );
                Foc::insert($data);
            }

            $arr2=array('10x10','10x3','10x2','10x1','5x1','100x1');

            for($i=0;$i<count($arr2);$i++){
                $data=array(
                    'name'=>$arr2[$i],
                );
                Package::insert($data);
            }

            $focs=Foc::all();
            $packages=Package::all();
            return view('backend.product.create',compact('categories','focs','packages'));
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInsertFormRequest $request)
    {
        
        $id=Product::insertGetId([
            'name'=>$request->product_name,
            'cat_id'=>$request->cat_id,
            'price'=>$request->price,
            'package_id'=>$request->package_id,
            'foc_id'=>$request->foc_id,
            'description'=>$request->description,            
            'img'=>$request->photo,
            'status'=>1,
        ]);
        
        Stock::create([
            'product_id'=>$id,
            'balance'=>0
        ]);
        return redirect('admin/product/create')->with('status','new product has been inserted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $focs=Foc::all();
        $categories=Category::all();
        $packages=Package::all();
        $product=Product::find($id);
        return view('backend.product.edit',compact('focs','categories','packages','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateFormRequest $request, $id)
    {
        $product=Product::find($id);
        $product->name=$request->get('product_name');
        $product->cat_id=$request->get('cat_id');
        $product->price=$request->get('price');
        $product->package_id=$request->get('package_id');
        $product->foc_id=$request->get('foc_id');
        $product->description=$request->get('description');
        $product->update();
        return redirect(action('admin\ProductController@edit',$id))->with('status','successfully edited');
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
