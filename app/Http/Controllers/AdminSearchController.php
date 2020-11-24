<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminSearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    // CLIENT SEARCH 
    public function email_client(Request $request)
    {
        $search = $request->search;

        $clients = DB::table('clients')
            ->where('email', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('admin.client')->with('clients', $clients);
    }

    public function name_client(Request $request)
    {
        $search = $request->search;

        $clients = DB::table('clients')
            ->where('name', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('admin.client')->with('clients', $clients);
    }

    public function name_perusahaan_client(Request $request)
    {
        $search = $request->search;

        $clients = DB::table('clients')
            ->where('name_perusahaan', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('admin.client')->with('clients', $clients);
    }

    public function role_client(Request $request)
    {
        $search = $request->search;

        $clients = DB::table('clients')
            ->where('role', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('admin.client')->with('clients', $clients);
    }

    public function telp_client(Request $request)
    {
        $search = $request->search;

        $clients = DB::table('clients')
            ->where('telp', 'like', "%" . $search . "%")
            ->paginate(8);

        return view('admin.client')->with('clients', $clients);
    }

    // USER SEARCH 
    public function email_user(Request $request)
    {
        $search = $request->search;

        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('email', 'like', "%" . $search . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        return view('admin.user')->with('users', $users);
    }

    public function name_user(Request $request)
    {
        $search = $request->search;

        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('name', 'like', "%" . $search . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        return view('admin.user')->with('users', $users);
    }

    public function divisi_user(Request $request)
    {
        $search = $request->search;

        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('divisi', 'like', "%" . $search . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        return view('admin.user')->with('users', $users);
    }

    public function role_user(Request $request)
    {
        $search = $request->search;

        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('role', 'like', "%" . $search . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        return view('admin.user')->with('users', $users);
    }

    public function telp_user(Request $request)
    {
        $search = $request->search;

        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('telp', 'like', "%" . $search . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        return view('admin.user')->with('users', $users);
    }

    // TIKET SEARCH 
    public function judul_tiket(Request $request)
    {
        $search = $request->search;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('judul', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'

            )
            ->paginate(8);

        return view('admin.tiket')->with('tikets', $tikets);
    }

    public function divisi_tiket(Request $request)
    {
        $search = $request->search;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('divisi', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'
            )
            ->paginate(8);

        return view('admin.tiket')->with('tikets', $tikets);
    }

    public function status_tiket(Request $request)
    {
        $search = $request->search;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('status', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'

            )
            ->paginate(8);

        return view('admin.tiket')->with('tikets', $tikets);
    }

    public function balasan_terbaru_tiket(Request $request)
    {
        $search = $request->search;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->where('tikets.balasan_terbaru', 'like', "%" . $search . "%")
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.updated_at',
                'tikets.id',
                'tikets.balasan_terbaru',
                'tikets.created_at'
            )
            ->paginate(8);

        return view('admin.tiket')->with('tikets', $tikets);
    }
}
