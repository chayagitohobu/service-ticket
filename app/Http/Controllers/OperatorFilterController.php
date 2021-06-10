<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Division;


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
        $division = Division::where('id', $user->division_id)->get()->first();
        $messages = DB::table('messages')
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
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
            ->where(function ($query) use ($user, $name) {
                $query->where('clients.name', 'like', "%" . $name . "%")
                    ->where('messages.division_id', '=', $user->division_id);
            })
            ->orWhere(function ($query) use ($user, $name) {
                $query->where('users.name', 'like', "%" . $name . "%")
                    ->where('messages.division_id', '=', $user->division_id);
            })
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

        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('messages', $messages)
            ->with('division', $division);
    }

    public function judul_tiket(Request $request)
    {
        $search = $request->search;
        $user =  Auth::guard('user')->user();
        $division = Division::where('id', $user->division_id)->get()->first();

        $messages = DB::table('messages')
            ->where('messages.division_id', '=', $user->division_id)
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
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
            ->where('title', 'like', "%" . $search . "%")
            ->paginate(8);

        $messages->appends(array('search' => $request->search));

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

        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('messages', $messages)
            ->with('division', $division);
    }

    public function status_tiket($status)
    {
        $user =  Auth::guard('user')->user();
        $division = Division::where('id', $user->division_id)->get()->first();

        $messages = DB::table('messages')
            ->where('messages.division_id', '=', $user->division_id)
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
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
            ->where('status', 'like', "%" . $status . "%")
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

        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('messages', $messages)
            ->with('division', $division);
    }

    public function update_tiket(Request $request)
    {
        $dari =  date($request->input('dari'));
        $sampai =  date($request->input('sampai'));

        $user =  Auth::guard('user')->user();
        $division = Division::where('id', $user->division_id)->get()->first();

        $messages = DB::table('messages')
            ->where('messages.division_id', '=', $user->division_id)
            ->leftJoin('clients', 'messages.client_id', 'clients.id')
            ->leftJoin('users', 'messages.user_id', 'users.id')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->select(
                'clients.id as client_id',
                'clients.name as client_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.role_id',
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.id',
                'messages.newest_reply',
                'messages.created_at',
            )
            ->whereBetween('messages.newest_reply', [$dari, $sampai])
            ->paginate(8);

        $messages->appends(array('dari' => date($request->input('dari')), 'sampai' => date($request->input('sampai'))));

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


        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('messages', $messages)
            ->with('division', $division);
    }
}
