<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;
use App\Lease;
use Auth;


class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $list = \App\Category::all();
        // $books = DB::table('books')->rightJoin('leases', 'books.id', '=', 'leases.book_id', 'leases.user_id', '=', $userId)->get();
        $leases = DB::table('leases')->where('user_id', $userId)->pluck('book_id');
        $books = DB::table('books')->whereIn('id', $leases)->paginate(3);
        $favorites = DB::table('favorites')->where('user_id', $userId)->pluck('book_id');
        $favorites = json_decode(json_encode($favorites), true);
        return view('user.myBooks',['list_category' => $list,'books'=>$books,'favorites'=>$favorites,compact('books'),compact( 'favorites')]);
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
        // dd( Auth::id());
        // die();
        $user_id=Auth::id();
        $request->validate([
            'book_id' => 'unique:leases,book_id,NULL,id,deleted_at,'.$user_id,
        ]);
        $lease = new Lease();
        $lease->user_id = Auth::id();
        $lease->book_id = $request->book_id;
        $lease->duration = $request->duration;
        $lease->save();
        $copies = DB::table('books')->join('leases', 'books.id', '=', 'leases.book_id')->decrement('no_copies', 1);
        return back()->withInput()->with('alert','book leased successfully!');
        // return redirect()->route('/book', ['id' => $request->book_id]);
        // return view('books.getdetails', ['id' => $id]);
        // return view('books.getdetails', ['id' => $id]);
        // return redirect()->route('books.getdetails', ['id' => $id]);
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
