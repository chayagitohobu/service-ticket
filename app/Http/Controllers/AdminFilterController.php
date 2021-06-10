<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Division;

class AdminFilterController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    // CLIENT SEARCH 
    public function email_client(Request $request)
    {
        $search = $request->input('email_search');

        $clients = DB::table('clients')
            ->where('email', 'like', "%" . $search . "%")
            ->paginate(8);

        $clients->appends(array('email_search' => $request->input('email_search')));

        return view('admin.client')->with('clients', $clients);
    }

    public function name_client(Request $request)
    {
        $search = $request->input('name_search');

        $clients = DB::table('clients')
            ->where('name', 'like', "%" . $search . "%")
            ->paginate(8);
        $clients->appends(array('name_search' => $request->input('name_search')));
        return view('admin.client')->with('clients', $clients);
    }

    public function name_perusahaan_client(Request $request)
    {
        $search = $request->input('perusahaan_search');

        $clients = DB::table('clients')
            ->where('company', 'like', "%" . $search . "%")
            ->paginate(8);
        $clients->appends(array('perusahaan_search' => $request->input('perusahaan_search')));
        return view('admin.client')->with('clients', $clients);
    }

    // public function role_client(Request $request)
    // {
    //     $search = $request->search;

    //     $clients = DB::table('clients')
    //         ->where('role', 'like', "%" . $search . "%")
    //         ->paginate(8);

    //     return view('admin.client')->with('clients', $clients);
    // }

    public function telp_client(Request $request)
    {
        $search = $request->input('telp_search');

        $clients = DB::table('clients')
            ->where('phone', 'like', "%" . $search . "%")
            ->paginate(8);
        $clients->appends(array('telp_search' => $request->input('telp_search')));
        return view('admin.client')->with('clients', $clients);
    }

    // USER SEARCH 
    public function email_user(Request $request)
    {
        $search = $request->input('email_search');

        $users = DB::table('users')
            ->join('divisions', 'users.division_id', 'divisions.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('email', 'like', "%" . $search . "%")
            ->select(
                'users.id',
                'users.email',
                'users.name',
                'users.phone',
                'users.created_at',
                'users.updated_at',
                'divisions.division',
                'roles.role'
            )
            ->paginate(8);

        $users->appends(array('email_search' => $request->input('email_search')));

        $divisions = Division::all();
        return view('admin.user')
            ->with('divisions', $divisions)
            ->with('users', $users);
    }

    public function name_user(Request $request)
    {
        $search = $request->input('name_search');

        $users = DB::table('users')
            ->join('divisions', 'users.division_id', 'divisions.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('name', 'like', "%" . $search . "%")
            ->select(
                'users.id',
                'users.email',
                'users.name',
                'users.phone',
                'users.created_at',
                'users.updated_at',
                'divisions.division',
                'roles.role'
            )
            ->paginate(8);

        $users->appends(array('name_search' => $request->input('name_search')));

        $divisions = Division::all();
        return view('admin.user')
            ->with('divisions', $divisions)
            ->with('users', $users);
    }


    public function telp_user(Request $request)
    {
        $search = $request->input('telp_search');

        $users = DB::table('users')
            ->join('divisions', 'users.division_id', 'divisions.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('phone', 'like', "%" . $search . "%")
            ->select(
                'users.id',
                'users.email',
                'users.name',
                'users.phone',
                'users.created_at',
                'users.updated_at',
                'divisions.division',
                'roles.role'
            )
            ->paginate(8);
        $users->appends(array('telp_search' => $request->input('telp_search')));

        $divisions = Division::all();
        return view('admin.user')
            ->with('divisions', $divisions)
            ->with('users', $users);
    }

    public function division_user($division)
    {
        $users = DB::table('users')
            ->join('divisions', 'users.division_id', 'divisions.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('division', 'like', "%" . $division . "%")
            ->select('users.id', 'users.email', 'users.name', 'users.created_at', 'users.updated_at', 'users.phone', 'divisions.division', 'roles.role')
            ->paginate(8);

        $divisions = Division::all();
        return view('admin.user')
            ->with('divisions', $divisions)
            ->with('users', $users);
    }

    public function role_user($role)
    {
        $users = DB::table('users')
            ->join('divisions', 'users.division_id', 'divisions.id')
            ->join('roles', 'users.role_id', 'roles.id')
            ->where('role', 'like', "%" . $role . "%")
            ->select(
                'users.id',
                'users.email',
                'users.name',
                'users.phone',
                'users.created_at',
                'users.updated_at',
                'divisions.division',
                'roles.role'
            )
            ->paginate(8);

        $divisions = Division::all();
        return view('admin.user')
            ->with('divisions', $divisions)
            ->with('users', $users);
    }

    // TIKET SEARCH 
    public function search(Request $request)
    {
        $search = $request->search;

        $tikets = DB::table('messages')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->where('title', 'like', "%" . $search . "%")
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.newest_reply',
                'messages.created_at'

            )
            ->paginate(8);

        $tikets->appends(array('search' => $request->search));

        $namas = DB::table('messages')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisions = Division::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }

    public function name_tiket($name)
    {
        $tikets = DB::table('messages')
            ->leftJoin('divisions', 'messages.division_id', '=', 'divisions.id')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->where('clients.name', 'like', "%" . $name . "%")
            ->orWhere('users.name', 'like', "%" . $name . "%")
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.newest_reply',
                'messages.created_at'
            )
            ->paginate(8);

        $namas = DB::table('messages')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisions = Division::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }
    public function division_tiket($division)
    {
        $tikets = DB::table('messages')
            ->leftJoin('divisions', 'messages.division_id', '=', 'divisions.id')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->where('division', 'like', "%" . $division . "%")
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.newest_reply',
                'messages.created_at'
            )
            ->paginate(8);

        $namas = DB::table('messages')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisions = Division::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }

    public function status_tiket($status)
    {
        $tikets = DB::table('messages')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->where('status', 'like', "%" . $status . "%")
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.newest_reply',
                'messages.created_at'

            )
            ->paginate(8);

        $namas = DB::table('messages')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisions = Division::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }

    public function update_tiket(Request $request)
    {
        $dari =  date($request->input('dari'));
        $sampai =  date($request->input('sampai'));

        $tikets = DB::table('messages')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->whereBetween('messages.newest_reply', [$dari, $sampai])
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.newest_reply',
                'messages.created_at'
            )
            ->paginate(8);

        $tikets->appends(array('dari' => date($request->input('dari')), 'sampai' => date($request->input('sampai'))));
        // dd($tikets);
        $namas = DB::table('messages')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->select(
                'clients.name as client_name',
                'users.name as user_name',
                'users.role_id',
            )
            ->groupBy('users.name', 'clients.name', 'users.role_id')
            ->get();

        $divisions = Division::all();

        return view('admin.tiket')
            ->with('namas', $namas)
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }
}
