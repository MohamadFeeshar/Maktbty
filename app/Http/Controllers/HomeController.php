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
        $order = $request->input('order');
        if(empty( $order)){ $order='created_at';} 
        $bookData = \App\Book::search($searchTerm)->orderBy($order, 'DESC')->paginate(3);
        if(empty($bookData)) echo "No search Results";
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
        $userId=Auth::id();
        // echo url()->previous();
        // echo url()->full();
        $list = \App\Category::all();
        $order = $request->input('order');
        $searchTerm = $request->input('searchTerm');
        $categoryItems = $request->input('categoryTerm');
        // echo http_build_query(array_merge($_GET, array('categoryTerm'=>1)));

        if(empty( $order)){ $order='created_at';} 
        $bookData = \App\Book::search($searchTerm)->where('category_id', 'like','%' .$categoryItems. '%')
        ->orderBy($order, 'DESC')->paginate(4);
        $favorites = DB::table('favorites')->where('user_id', $userId)->pluck('book_id');
        $favorites = json_decode(json_encode($favorites), true);
       
        // $query = array_merge($_GET,array(
        //     'searchTerm' => $request->input('searchTerm'),
        //     'order' => $request->input('order'),
        //     'categoryTerm'=>$request->input('categoryTerm')
        // ));
// var_dump( $query);

// return view ('bookcategory', ['list_category' => $list, 
// 'book_data'=>$bookData
// ,'favorites'=>$favorites
// ,compact('categoryItems')
// ,$query]);
        return view ('bookcategory',['list_category' => $list, 
        'book_data'=>$bookData
        ,'favorites'=>$favorites
        ,compact('categoryItems')
        ]);
    }
  
}
