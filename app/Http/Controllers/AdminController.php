<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Lease;
use App\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight", $previous_week);
        $end_week = strtotime("next saturday", $start_week);
        $start_week = date("Y-m-d", $start_week);
        $end_week = date("Y-m-d", $end_week);
        $lastWeekLease=Lease::select(Lease::raw('SUM(price*duration) AS profit,DATE(leases.created_at) as date'))
                            ->join('books','books.id','=','book_id')
                            ->whereBetween('leases.created_at', [$start_week, $end_week])
                            ->orderBy('date', 'asc')
                            ->groupBy('date')
                            ->get();
        return view('admin.dashboard',['profit'=>$lastWeekLease]);
    }

    public function index()
    {
        $loggedAdmin = Auth::user();
        $admins = User::where('type', 'admin')->where('id', '!=', $loggedAdmin->id)->get();
        return view('admin.admins', ['admins' => $admins]);
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
        $admin = new User();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->type = 'admin';
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('/dashboard/admins');
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
        $admin = User::find($id);
        return view('admin.editAdmin', ['admin' => $admin]);
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
            'username' => 'required|string|max:50|unique:users,username,' . $id,
            'email' => 'required|string|email|unique:users,email,' . $id,
            'phone' => 'required|digits:11|unique:users,phone,' . $id,
            'address' => 'required|string',
            'password' => 'required|string|min:8'

        ]);
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('/dashboard/admins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect('/dashboard/admins');
    }
}
