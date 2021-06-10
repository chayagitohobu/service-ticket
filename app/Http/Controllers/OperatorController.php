<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('operator');
    }

    public function index()
    {
        $user =  Auth::guard('user')->user();

        $jumlah_tiket =  DB::table('messages')
            ->where('messages.user_id', '=', $user->id)
            ->count();

        $status_buka = DB::table('messages')
            ->where('messages.division_id', '=', $user->division_id)
            ->where('status', '=', 'Open')
            ->count();

        $status_tutup = DB::table('messages')
            ->where('messages.division_id', '=', $user->division_id)
            ->where('status', '=', 'Close')
            ->count();

        $belum_terjawab = DB::table('messages')
            ->where('messages.division_id', '=', $user->division_id)
            ->where('status', '=', 'Balasan Client')
            ->count();

        $aktivitas_terbarus = DB::table('messages')
            ->where('messages.division_id', '=', $user->division_id)
            ->leftJoin('replies', 'messages.id', 'replies.message_id')
            ->latest('messages.newest_reply', 'DESC')
            ->select('messages.title', 'messages.newest_reply')
            ->take(4)
            ->get();

        return view('operator.dashboard')
            ->with('jumlah_tiket', $jumlah_tiket)
            ->with('status_buka', $status_buka)
            ->with('status_tutup', $status_tutup)
            ->with('belum_terjawab', $belum_terjawab)
            ->with('aktivitas_terbarus', $aktivitas_terbarus);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  CREATE 
    public function create()
    {
        //
    }

    // CREATE END

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // STORE 

    public function store(Request $request)
    {
        //
    }

    // STORE END




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // READ

    public function show()
    {
        $operator_id = Auth::guard('user')->user()->id;
        $division_id = Auth::guard('user')->user()->division_id;
        $operator = DB::table('users')
            ->leftJoin('divisions', 'users.division_id', 'divisions.id')
            ->where('users.id', $operator_id)
            ->where('divisions.id', $division_id)
            ->get()
            ->first();
        return view('operator.profile')->with('operator', $operator);
    }

    // READ END

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // EDIT 
    public function edit()
    {

        $operator = Auth::guard('user')->user();
        return view('operator.profile_edit')->with('operator', $operator);
    }



    // EDIT END

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //  UPDATE
    public function update(Request $request)
    {
        $user_id = Auth::guard('user')->user()->id;
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect('operator/profile')->with('success', 'User berhasil di update !!');
    }



    // UPDATE END

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  DESTROY

    public function destroy($id)
    {
        //
    }
    // DESTROY END


}
