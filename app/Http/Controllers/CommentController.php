<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authorize;
use PhpParser\Node\Expr\New_;
use App\Comment;
use App\Rate;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->book_id = $request->book_id;
        $comment->content = $request->comment;
        $comment->rate = '0';


        // table('comments')->join('rates', 'comments.user_id', '=', 'rates.user_id')->select('rate')->get();
        $comment->save();
        return back()->withInput()->with('alert','successful operation!');
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
        $comment = Comment::find($id);
        return view('edit')->with('comment',$comment);
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
        $comment = Comment::find($id);
        $this -> Authorize('update',$comment);
        $comment->content = $request->comment;
        $comment->book_id;
        $comment->save();
        return redirect(url('book', $comment->book_id))->with('alert','successful operation!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $this -> Authorize('delete',$comment);
        $comment->delete();
        return back()->withInput()->with('alert','successful operation!');
        // return redirect(url('book', $comment->book_id));
    }
}
