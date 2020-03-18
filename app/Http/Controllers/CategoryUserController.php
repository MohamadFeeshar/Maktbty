<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Category;
use Auth;

class CategoryUserController extends Controller
{
    public function index(){

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::id();
        $books = DB::table('books')->where('category_id', $id)->paginate(3);
        $favorites = DB::table('favorites')->where('user_id', $userId)->pluck('book_id');
        return view('user.category')->with(compact('books', 'favorites'));
    }
}
