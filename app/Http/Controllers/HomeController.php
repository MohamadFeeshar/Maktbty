<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $list = \App\Category::all();
        $searchTerm = $request->input('searchTerm');
        $bookData = \App\Book::search($searchTerm)->orderBy('price', 'DESC')->paginate(3);
             
        return view('home', ['list_category' => $list, 
        'book_data'=>$bookData
        ,compact('bookData')
        ]);
       
       if(!$searchTerm)
       {
         $bookData = \App\Book::orderBy('created_at', 'DESC')->paginate(3);
       
         return view('home', ['list_category' => $list, 
         'book_data'=>$bookData ]);
       }
    }
      
}
