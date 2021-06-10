<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientBasisinformasiController extends Controller
{
    public function index()
    {
        $informations = DB::table('informations')->where('category', 'faq')->orderBy('created_at', 'desc')->get();
        return view('client.basis_informasi.index')->with('informations', $informations);
    }

    public function cari(Request $request)
    {
        $informations = DB::table('informations')
            ->where('question', 'LIKE', '%' . $request->input('cari') . '%')
            ->orWhere('answer', 'LIKE', '%' . $request->input('cari') . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('client.basis_informasi.index')->with('informations', $informations);
    }
}
