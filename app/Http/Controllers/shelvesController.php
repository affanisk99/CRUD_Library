<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shelves;

class shelvesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $shelves = Shelves::All();
        return view('/shelves/index',['shelves'=>$shelves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // di method create ini nggak perlu cek lastid, lastid dicari saat simpan data aja.
        $lastid = Shelves::latest('id')->first();
        // $newID = $lastid->id+1;
        $newID = 1;
        $shelves = 'SH-'.$newID;
        // dd($shelves);
        return view('/shelves/create',['shelves'=>$shelves]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // di sini bikin logic dapetin last id


        // setelah last id dapet, dicek dulu apakah last id nya ada atau null
        // jika ada, dapetin last id terus ditambah 1. jika NULL maka id adalah 1


       $shelves=$this->validate($request,[
            'code'=>'required',
            'description'=>'required']);
        DB::table('shelves')->insert($shelves);
        return redirect('/shelves');
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
        $shelves=DB::table('shelves')->where('id',$id)->first();
        return view ('/shelves/edit',['shelves'=>$shelves]);
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
        $shelves=$this->validate($request,[
            'description'=>'required']);
        DB::table('shelves')->where('id',$id)->update($shelves);
        return redirect('/shelves');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelves=Shelves::find($id);
        $shelves->forceDelete();
        return redirect('/shelves');
    }
}
