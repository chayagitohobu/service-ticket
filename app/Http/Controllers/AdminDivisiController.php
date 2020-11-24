<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Div;

class AdminDivisiController extends Controller
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
        $divisis = Divisi::paginate(8);
        return view('admin.divisi')->with('divisis', $divisis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_divisi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $divisi = new Divisi;
        $divisi->divisi = $request->input('divisi');
        $divisi->save();

        return redirect('admin/divisi')->with('success', 'Divisi telah dibuat !');
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
        $divisi = Divisi::find($id);
        return view('admin.edit_divisi')->with('divisi', $divisi);
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
        $divisi = Divisi::find($id);
        $divisi->divisi = $request->input('divisi');
        $divisi->save();
        return redirect('admin/divisi')->with('success', 'Divisi telah di update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'test';
        $divisi = Divisi::find($id);
        $divisi->delete();

        return redirect('admin/divisi')->with('success', 'Divisi berhasil di hapus !!');
    }
}
