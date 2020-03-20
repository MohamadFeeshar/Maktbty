<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ban(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return redirect('/dashboard/users');
    }

    public function editProfile()
    {
        $id = Auth::id();
        $user = User::find($id);
        $categories = \App\Category::all();
        return view('user.editProfile', ['user' => $user, 'list_category' => $categories]);
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::id();
        // echo $id;
        $request->validate([
            'username' => "required|string|max:50|unique:users,username,{$id},id,deleted_at,NULL",
            'email' => "required|string|email|unique:users,email,{$id},id,deleted_at,NULL",
            'phone' => "required|digits:11|unique:users,phone,{$id},id,deleted_at,NULL",
            'address' => 'required|string',
            'password' => 'required|string|min:8'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
        $categories = \App\Category::all();
        return redirect('/home')->with('success','Profile updated successfully!');
    }

    public function index()
    {
        $users = User::where('type', 'user')->get();
        return view('admin.users', ['users' => $users]);
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
        $request->validate([
            'username' => 'required|string|max:50|unique:users,username,NULL,id,deleted_at,NULL',
            'email' => 'required|string|email|unique:users,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|digits:11|unique:users,phone,NULL,id,deleted_at,NULL',
            'address' => 'required|string',
            'password' => 'required|string|min:8'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/dashboard/users')->with('success','User added successfully');
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
        $user = User::find($id);
        return view('admin.editUser', ['user' => $user]);
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
        $request->validate([
            'username' => "required|string|max:50|unique:users,username,{$id},id,deleted_at,NULL",
            'email' => "required|string|email|unique:users,email,{$id},id,deleted_at,NULL",
            'phone' => "required|digits:11|unique:users,phone,{$id},id,deleted_at,NULL",
            'address' => 'required|string',
            'password' => 'required|string|min:8'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/dashboard/users')->with('success','User data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/dashboard/users');
    }
}
