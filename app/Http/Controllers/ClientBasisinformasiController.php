<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientBasisinformasiController extends Controller
{
    public function index()
    {
        $pertanyaans = DB::table('pertanyaans')->where('kategori', 'faq')->orderBy('created_at', 'desc')->get();
        return view('client.basis_informasi.index')->with('pertanyaans', $pertanyaans);
    }

    public function cari(Request $request)
    {
        $pertanyaans = DB::table('pertanyaans')
            ->where('pertanyaan', 'LIKE', '%' . $request->input('cari') . '%')
            ->orWhere('jawaban', 'LIKE', '%' . $request->input('cari') . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('client.basis_informasi.index')->with('pertanyaans', $pertanyaans);
    }
}
