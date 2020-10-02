<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Publisher;
use App\Shelves;
use App\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categories::get();
        $shelves=Shelves::get();
        $publisher=Publisher::get();
        $books=Books::get();
        return view('/books/index',['books'=>$books,'categories'=>$categories, 'publisher'=>$publisher, 'shelves'=>$shelves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categories::get();
        $publisher=Publisher::get();
        $shelves=Shelves::get();
        return view('/books/create',['categories'=>$categories, 'publisher'=>$publisher, 'shelves'=>$shelves]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lastid = Books::latest('id')->first();
        
        if($lastid<'1'){
            $newID='1';
        }elseif ($lastid>'1') {
            $newID=$lastid->id+'1';
        }
        $code = 'BK-'.$newID;
        $data['code']=$code;

        $val=$this->validate($request,[
            'name'=>'required',
            'author'=>'required',
            'description'=>'required',
            'release_date'=>'required',
            'category_id'=>'required',
            'publisher_id'=>'required',
            'shelves_id'=>'required',
            'is_available'=>'required']);
        $books = ($val+$data);
        DB::table('books')->insert($books);
        return redirect('/books/index');
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
        $categories=Categories::get();
        $shelves=Shelves::get();
        $publisher=Publisher::get();
        $books=Books::find($id);
        return view('/books/edit',['books'=>$books,'categories'=>$categories, 'publisher'=>$publisher, 'shelves'=>$shelves]);
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
        $books=$this->validate($request,[
            'name'=>'required',
            'author'=>'required',
            'description'=>'required',
            'release_date'=>'required',
            'category_id'=>'required',
            'publisher_id'=>'required',
            'shelves_id'=>'required',
            'is_available'=>'required']);
        DB::table('books')->where('id',$id)->update($books);
        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $books = Books::find($id);
        $books->delete();
        return redirect('/books');
    }
    public function bin(){
        $books=Books::onlyTrashed()->get();
        return view('/books/bin',['books'=>$books]);
    }
    public function rollback($id){
        $books = Books::onlyTrashed()->where('id',$id);
        $books->restore();
        return redirect('/books/bin');
    }
    public function destroy($id)
    {
        $books = Books::onlyTrashed()->where('id',$id);
        $books->forcedelete();
        return redirect('/books/bin');
    }
}
