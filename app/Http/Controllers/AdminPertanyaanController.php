<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $informations = DB::table('informations')->orderBy('created_at', 'desc')->paginate(8);
        return view('admin.pertanyaan.index')->with('informations', $informations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $information = new Information();
        $information->question = $request->input('pertanyaan');
        $information->category = $request->input('kategori');
        $information->answer = $request->input('jawaban');
        $information->save();
        return redirect()->route('admin.pertanyaan.index')->with('success', 'pertanyaan berhasil di tambahkan !');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = Information::find($id);
        return view('admin.pertanyaan.show')->with('information', $information);
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
        $information = Information::find($id);
        return view('admin.pertanyaan.edit')->with('information', $information);
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
        $information = Information::find($id);
        $information->question = $request->input('question');
        $information->category = $request->input('category');
        $information->answer = $request->input('answer');
        $information->save();

        return redirect()->route('admin.pertanyaan.index')->with('success', 'pertanyaan berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::find($id);
        $information->delete();
        return redirect()->route('admin.pertanyaan.index')->with('success', 'pertanyaan berhasil di hapus !');
        //
    }
}
