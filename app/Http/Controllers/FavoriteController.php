<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $userId = Auth::id();
        //$favorites = DB::table('favorites')->where('user_id', $userId)->pluck('book_id');
        $books = DB::table('books')->rightJoin('favorites', 'books.id', '=', 'favorites.book_id', 'favorites.user_id', '=', $userId)->get();
        //return dd(gettype($books));
        return view('user.favorites')->with(['books'=>$books]);
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
}
