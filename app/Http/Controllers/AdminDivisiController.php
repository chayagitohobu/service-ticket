<?php

namespace App\Http\Controllers;

use App\Models\Division;
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
        $divisions = Division::paginate(8);
        return view('admin.divisi')->with('divisions', $divisions);
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
        $division = new Division;
        $division->division = $request->input('divisi');
        $division->save();

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
        $division = Division::find($id);
        return view('admin.edit_divisi')->with('divisi', $division);
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
        $division = Division::find($id);
        $division->division = $request->input('division');
        $division->save();
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
        $division = Division::find($id);
        $division->delete();

        return redirect('admin/divisi')->with('success', 'Divisi berhasil di hapus !!');
    }
}
