<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class ClientController extends Controller
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
        $this->middleware('auth:client');
    }

    public function index()
    {
        return view('client.dashboard');
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

    public function store_tiket()
    {
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
        $client = Auth::guard('client')->user();

        return view('client.profile')->with('client', $client);
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

        $client = Auth::guard('client')->user();

        return view('client.profile_edit')->with('client', $client);
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
        $client_id = Auth::guard('client')->user()->id;

        $client = Client::find($client_id);
        $client->name = $request->input('name');
        $client->name_perusahaan = $request->input('name_perusahaan');
        $client->telp = $request->input('telp');
        $client->role = $request->input('role');
        $client->save();

        return redirect('client/profile')->with('success', 'profile berhasil di update !!');
    }

    public function update_profile($id)
    {
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
