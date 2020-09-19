<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Publisher;

class publisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publisher = Publisher::All();
        return view('/publisher/index',['publisher'=>$publisher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/publisher/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publisher=$this->validate($request,[
            'name'=>'required']);
        DB::table('publisher')->insert($publisher);
        return redirect('/publisher');
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
        $publisher=DB::table('publisher')->where('id',$id)->first();
        return view ('/publisher/edit',['publisher'=>$publisher]);
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
        $publisher=$this->validate($request,[
            'name'=>'required']);
        DB::table('publisher')->where('id',$id)->update($publisher);
        return redirect('/publisher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publisher=Publisher::find($id);
        $publisher->forceDelete();
        return redirect('/publisher');
    }
}
