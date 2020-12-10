<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Divisi;

class AdminFilterController extends Controller
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
        $divisis = Divisi::all();
        return view('admin.user')
            ->with('divisis', $divisis)
            ->with('users', $users);
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
        $divisis = Divisi::all();
        return view('admin.user')
            ->with('divisis', $divisis)
            ->with('users', $users);
    }


    public function telp_user(Request $request)
    {
        $search = $request->search;

        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('telp', 'like', "%" . $search . "%")
            ->select(
                'users.id',
                'users.email',
                'users.name',
                'users.telp',
                'divisis.divisi',
                'roles.role'
            )
            ->paginate(8);

        $divisis = Divisi::all();
        return view('admin.user')
            ->with('divisis', $divisis)
            ->with('users', $users);
    }

    public function divisi_user($divisi)
    {

        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('divisi', 'like', "%" . $divisi . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        $divisis = Divisi::all();
        return view('admin.user')
            ->with('divisis', $divisis)
            ->with('users', $users);
    }

    public function role_user($role)
    {
        $users = DB::table('users')
            ->join('divisis', 'users.divisi_id', 'divisis.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('role', 'like', "%" . $role . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.telp', 'divisis.divisi', 'roles.role')
            ->paginate(8);

        $divisis = Divisi::all();
        return view('admin.user')
            ->with('divisis', $divisis)
            ->with('users', $users);
    }

    // TIKET SEARCH 
    public function search(Request $request)
    {
        $search = $request->search;

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->where('judul', 'like', "%" . $search . "%")
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
            ->paginate(8);

        $namas = DB::table('tikets')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisis = Divisi::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisis', $divisis)
            ->with('tikets', $tikets);
    }

    public function name_tiket($name)
    {
        $tikets = DB::table('tikets')
            ->leftJoin('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->where('clients.name', 'like', "%" . $name . "%")
            ->orWhere('users.name', 'like', "%" . $name . "%")
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
            ->paginate(8);

        $namas = DB::table('tikets')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisis = Divisi::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisis', $divisis)
            ->with('tikets', $tikets);
    }
    public function divisi_tiket($divisi)
    {
        $tikets = DB::table('tikets')
            ->leftJoin('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->where('divisi', 'like', "%" . $divisi . "%")
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
            ->paginate(8);

        $namas = DB::table('tikets')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisis = Divisi::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisis', $divisis)
            ->with('tikets', $tikets);
    }

    public function status_tiket($status)
    {
        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->where('status', 'like', "%" . $status . "%")
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
            ->paginate(8);

        $namas = DB::table('tikets')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisis = Divisi::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisis', $divisis)
            ->with('tikets', $tikets);
    }

    public function update_tiket(Request $request)
    {
        $dari =  date($request->input('dari'));
        $sampai =  date($request->input('sampai'));

        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->whereBetween('tikets.balasan_terbaru', [$dari, $sampai])
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
            ->paginate(8);

        // dd($tikets);
        $namas = DB::table('tikets')
            ->leftJoin('clients', 'tikets.client_id', 'clients.id')
            ->leftJoin('users', 'tikets.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisis = Divisi::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisis', $divisis)
            ->with('tikets', $tikets);
    }
}
