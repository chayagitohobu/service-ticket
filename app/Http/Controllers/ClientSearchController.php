<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientSearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:client');
    }

    // TIKET SEARCH 
    public function judul_tiket(Request $request)
    {
        $search = $request->search;
        $user_id = Auth::guard('client')->user()->id;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('judul', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.created_at',
                'tikets.balasan_terbaru'
            )
            ->where('tikets.client_id', '=', $user_id)
            ->paginate(8);

        return view('client.tiket')->with('tikets', $tikets);
    }

    public function divisi_tiket(Request $request)
    {
        $search = $request->search;
        $user_id = Auth::guard('client')->user()->id;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('divisi', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.created_at',
                'tikets.balasan_terbaru'
            )
            ->where('tikets.client_id', '=', $user_id)
            ->paginate(8);

        return view('client.tiket')->with('tikets', $tikets);
    }

    public function status_tiket(Request $request)
    {
        $search = $request->search;
        $user_id = Auth::guard('client')->user()->id;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('status', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.created_at',
                'tikets.balasan_terbaru',
            )
            ->where('tikets.client_id', '=', $user_id)
            ->paginate(8);

        return view('client.tiket')->with('tikets', $tikets);
    }

    public function balasan_terbaru_tiket(Request $request)
    {
        $search = $request->search;
        $user_id = Auth::guard('client')->user()->id;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('tikets.balasan_terbaru', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at',
            )
            ->where('tikets.client_id', '=', $user_id)
            ->paginate(8);


        return view('client.tiket')->with('tikets', $tikets);
    }
}
