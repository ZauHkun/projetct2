<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryInsertFormRequest;
use App\Http\Requests\CategoryUpdateFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $forms=Form::all();
        if(count($forms)>0){
            return view('backend.category.create',compact('forms'));
        }else{
            $arr=array('capsule','chewable','cream','suspension','gel','syrup','ing','spo','softgel','tablet');
            rsort($arr);
            for($i=0;$i<count($arr);$i++){
                $data=array(
                    'name'=>$arr[$i] 
                );
                $form=Form::insert($data);
            }
            $forms=Form::all();
            return view('backend.category.create',compact('forms'));        
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryInsertFormRequest $request)
    {
        Category::create([
            'name'=>$request->get('category_name'),
            'form_id'=>$request->get('form_id'),            
        ]);
        return redirect('admin/category/create')->with('status','new category has been inserted.');
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
    {   $forms=Form::all();
        $category=Category::whereId($id)->firstOrFail();
        return view('backend.category.edit',compact('category','forms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateFormRequest $request, $id)
    {        
        $category=Category::whereId($id)->firstOrFail();
        $category->name=$request->get('category_name');        
        $category->form_id=$request->get('form_id'); 
        $category->update();
        return redirect(action('admin\CategoryController@edit',$id))->with('status','successfully edited.');
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
