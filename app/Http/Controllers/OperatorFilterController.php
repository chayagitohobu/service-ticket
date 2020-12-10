<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Divisi;


class OperatorFilterController extends Controller
{

    public function __construct()
    {
        $this->middleware('operator');
    }

    // TIKET SEARCH 


    public function name_tiket($name)
    {
        $user =  Auth::guard('user')->user();
        $divisi = Divisi::where('id', $user->divisi_id)->get()->first();
        $tikets = DB::table('tikets')
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
            ->where(function ($query) use ($user, $name) {
                $query->where('clients.name', 'like', "%" . $name . "%")
                    ->where('tikets.divisi_id', '=', $user->divisi_id);
            })
            ->orWhere(function ($query) use ($user, $name) {
                $query->where('users.name', 'like', "%" . $name . "%")
                    ->where('tikets.divisi_id', '=', $user->divisi_id);
            })
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

        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('tikets', $tikets)
            ->with('divisi', $divisi);
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

        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('tikets', $tikets)
            ->with('divisi', $divisi);
    }

    public function status_tiket($status)
    {
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
            ->where('status', 'like', "%" . $status . "%")
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

        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('tikets', $tikets)
            ->with('divisi', $divisi);
    }

    public function update_tiket(Request $request)
    {
        $dari =  date($request->input('dari'));
        $sampai =  date($request->input('sampai'));

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
            ->whereBetween('tikets.balasan_terbaru', [$dari, $sampai])
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


        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('tikets', $tikets)
            ->with('divisi', $divisi);
    }
}
