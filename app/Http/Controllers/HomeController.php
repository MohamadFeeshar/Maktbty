<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
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
        
            $userId=Auth::id();
            $list = \App\Category::all();
            $searchTerm = $request->input('searchTerm');
            $bookData = \App\Book::search($searchTerm)->orderBy('created_at', 'DESC')->paginate(3);
      
            $favorites = DB::table('favorites')->where('user_id', $userId)->pluck('book_id');
            $favorites = json_decode(json_encode($favorites), true);
            return view('home', ['list_category' => $list, 
            'book_data'=>$bookData
            ,'favorites'=>$favorites
            ,compact('bookData')
            ]);
     
        }
        public function category(Request $request)
        {
            $list = \App\Category::all();
    
            $categoryItems = $request->input('categoryTerm');
            $bookData = \App\Book::where('category_id', 'like','%' .$categoryItems. '%')->orderBy('created_at', 'DESC')->paginate(3);
    
            return view ('bookcategory',['list_category' => $list, 
            'book_data'=>$bookData
            ,compact('categoryItems')
            ]);
        }
        public function order(Request $request)
        {
            $userId=Auth::id();
    
            $list = \App\Category::all();
            $order = $request->input('order');
            $bookData = \App\Book::orderBy($order, 'DESC')->paginate(3);
            $favorites = DB::table('favorites')->where('user_id', $userId)->pluck('book_id');
            $favorites = json_decode(json_encode($favorites), true);
           
            return view ('orderBooks',['list_category' => $list, 
            'book_data'=>$bookData,
            'favorites'=>$favorites,
    
            compact('order')
            ]);
        }
}
