<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Category;

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
        $books = DB::table('books')->where('category_id', $id)->paginate(3);
        return view('user.category', ['books'=>$books]);
    }
}
