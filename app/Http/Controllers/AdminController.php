<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Divisi;
use App\Models\User;
use App\Models\Tiket;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        // $banyak_users = count($users);

        $clients = Client::all();
        // $banyak_clients = count($clients);

        $divisis = Divisi::all();
        // $banyak_divisis = count($divisis);

        $tikets = Tiket::all();
        // $banyak_tikets = count($tikets);

        return view('admin.dashboard')
            ->with('users', $users)
            ->with('clients', $clients)
            ->with('divisis', $divisis)
            ->with('tikets', $tikets);
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
        $user_id = Auth::guard('user')->user()->id;
        $user = DB::table('users')
            ->where('users.id', '=', $user_id)
            ->leftJoin('divisis', 'users.divisi_id', 'divisis.id')
            ->select('users.name', 'users.email', 'users.telp', 'divisis.divisi')
            ->get()
            ->first();

        return view('admin.profile')->with('user', $user);
    }
    // READ END

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // EDIT 
    public function edit($id)
    {
        return view('admin.edit_profile');
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
    public function update(Request $request, $id)
    {
        //
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
