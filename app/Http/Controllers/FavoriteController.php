<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;
use App\Favorite;
use Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = \App\Category::all();

        $favorites = DB::table('favorites')->where('user_id', $userId)->pluck('book_id');
        $books = DB::table('books')->whereIn('id', $favorites)->paginate(3);
        return view('user.favorites',['list_category' => $list,'books'=>$books,'favorites'=>$favorites,compact('books'),compact( 'favorites')]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = \App\Book::orderBy('price', 'DESC')->paginate(3);
        $categories = \App\Category::all();
     
        // $request->validate(['book_id' => 'Null|unique:favorites']);
        $favorites =new Favorite();
        $favorites->user_id = Auth::id();
        $favorites->book_id = $request->input('favouriteTerm');
        $favorites->save();
    
        return view('home', ['list_category' => $categories, 
        'book_data'=>$book ]);
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
    /**
     *  @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    
    public function addRemove(Request $request){
        $userId = Auth::id();
        $exist = DB::table('favorites')->where('user_id', $userId)->where('book_id', $request->bookId);
        if($exist->exists()){
            $exist->delete();
            return response()->json(['success'=>'deleted']);
        }
        $favorites =new Favorite();
        $favorites->user_id = Auth::id();
        $favorites->book_id = $request->bookId;
        $favorites->save();

        return response()->json(['success'=>'added']);
    }
}
