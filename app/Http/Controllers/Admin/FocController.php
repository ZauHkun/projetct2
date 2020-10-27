<?php

namespace App\Http\Controllers\admin;

use App\Foc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FocInsertFormRequest;
use App\Http\Requests\FocUpdateFormRequest;

class FocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $focs=Foc::all();
        return view('backend.foc.index',compact('focs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.foc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FocInsertFormRequest $request)
    {
        Foc::create([
            'name'=>$request->get('foc_name')
        ]);
        return redirect('admin/foc/create')->with('status','successfully inserted');
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
        $foc=Foc::whereId($id)->firstOrFail();
        return view('backend.foc.edit',compact('foc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FocUpdateFormRequest $request, $id)
    {
        $foc=Foc::whereId($id)->firstOrFail();
        $foc->name=$request->get('foc_name');
        $foc->update();
        return redirect(action('admin\FocController@edit',$id))->with('status','Successfully edited.');
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
