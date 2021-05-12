<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\DB;

class AdminPertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $pertanyaans = DB::table('pertanyaans')->orderBy('created_at', 'desc')->paginate(8);
        return view('admin.pertanyaan.index')->with('pertanyaans', $pertanyaans);
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
        $pertanyaan = new pertanyaan;
        $pertanyaan->pertanyaan = $request->input('pertanyaan');
        $pertanyaan->kategori = $request->input('kategori');
        $pertanyaan->jawaban = $request->input('jawaban');
        $pertanyaan->save();
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
        $pertanyaan = pertanyaan::find($id);
        return view('admin.pertanyaan.show')->with('pertanyaan', $pertanyaan);
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
        $pertanyaan = pertanyaan::find($id);
        return view('admin.pertanyaan.edit')->with('pertanyaan', $pertanyaan);
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
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->pertanyaan = $request->input('pertanyaan');
        $pertanyaan->kategori = $request->input('kategori');
        $pertanyaan->jawaban = $request->input('jawaban');
        $pertanyaan->save();

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
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();
        return redirect()->route('admin.pertanyaan.index')->with('success', 'pertanyaan berhasil di hapus !');
        //
    }
}
