<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminClientController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $clients = DB::table('clients')
            ->paginate(8);

        return view('admin.client')->with('clients', $clients);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create([
            'name' => $request->name,
            'name_perusahaan' => $request->name_perusahaan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
        ]);

        return redirect('admin/client')->with('success', 'Client berhasil dibuat !');
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
        $client = Client::find($id);
        return view('admin.edit_client')->with('client', $client);
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
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->name_perusahaan = $request->input('name_perusahaan');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->telp = $request->input('telp');
        $client->save();

        return redirect('admin/client')->with('success', 'client berhasil di update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect('admin/client')->with('success', 'Client berhasil dihapus !!');
    }
}
