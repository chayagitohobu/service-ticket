<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Divisi;


class OperatorSearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('operator');
    }

    // TIKET SEARCH 

    public function client_tiket(Request $request)
    {
        $search = $request->search;
        $user =  Auth::guard('user')->user();
        $divisi = Divisi::where('id', $user->divisi_id)->get()->first();
        $tikets = DB::table('tikets')
            ->where('tikets.divisi_id', '=', $user->divisi_id)
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'
            )
            ->Where('clients.name', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('operator.tiket')->with('tikets', $tikets)->with('divisi', $divisi);
    }

    public function user_tiket(Request $request)
    {
        $search = $request->search;
        $user =  Auth::guard('user')->user();
        $divisi = Divisi::where('id', $user->divisi_id)->get()->first();
        $tikets = DB::table('tikets')
            ->where('tikets.divisi_id', '=', $user->divisi_id)
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'
            )
            ->where('users.name', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('operator.tiket')->with('tikets', $tikets)->with('divisi', $divisi);
    }

    public function judul_tiket(Request $request)
    {
        $search = $request->search;
        $user =  Auth::guard('user')->user();
        $divisi = Divisi::where('id', $user->divisi_id)->get()->first();

        $tikets = DB::table('tikets')
            ->where('tikets.divisi_id', '=', $user->divisi_id)
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'
            )
            ->where('judul', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('operator.tiket')->with('tikets', $tikets)->with('divisi', $divisi);
    }

    public function status_tiket(Request $request)
    {
        $search = $request->search;
        $user =  Auth::guard('user')->user();
        $divisi = Divisi::where('id', $user->divisi_id)->get()->first();

        $tikets = DB::table('tikets')
            ->where('tikets.divisi_id', '=', $user->divisi_id)
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'
            )
            ->where('status', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('operator.tiket')->with('tikets', $tikets)->with('divisi', $divisi);
    }

    public function balasan_terbaru_tiket(Request $request)
    {
        $search = $request->search;
        $user =  Auth::guard('user')->user();
        $divisi = Divisi::where('id', $user->divisi_id)->get()->first();

        $tikets = DB::table('tikets')
            ->where('tikets.divisi_id', '=', $user->divisi_id)
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at',
            )
            ->where('tikets.balasan_terbaru', 'like', "%" . $search . "%")
            ->paginate(8);


        return view('operator.tiket')->with('tikets', $tikets)->with('divisi', $divisi);
    }
}
