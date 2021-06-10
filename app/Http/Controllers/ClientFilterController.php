<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Division;

class ClientFilterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:client');
    }

    // TIKET SEARCH 
    public function title_tiket(Request $request)
    {
        $search = $request->search;
        $user_id = Auth::guard('client')->user()->id;

        $tikets = DB::table('messages')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->where('title', 'like', "%" . $search . "%")
            ->select(
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.created_at',
                'messages.newest_reply'
            )
            ->where('messages.client_id', '=', $user_id)
            ->paginate(8);

        $tikets->appends(array('search' => $request->search));

        $divisions = Division::all();
        return view('client.tiket')
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }

    public function division_tiket($division)
    {
        $user_id = Auth::guard('client')->user()->id;

        $tikets = DB::table('messages')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->where('division', 'like', "%" . $division . "%")
            ->select(
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.created_at',
                'messages.newest_reply'
            )
            ->where('messages.client_id', '=', $user_id)
            ->paginate(8);

        $divisions = Division::all();
        return view('client.tiket')
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }

    public function status_tiket($status)
    {
        $user_id = Auth::guard('client')->user()->id;

        $tikets = DB::table('messages')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->where('status', 'like', "%" . $status . "%")
            ->select(
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.updated_at',
                'messages.id',
                'messages.created_at',
                'messages.newest_reply',
            )
            ->where('messages.client_id', '=', $user_id)
            ->paginate(8);

        $divisions = Division::all();
        return view('client.tiket')
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }

    public function update_tiket(Request $request)
    {
        $user_id = Auth::guard('client')->user()->id;
        $dari =  date($request->input('dari'));
        $sampai =  date($request->input('sampai'));

        $tikets = DB::table('messages')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->whereBetween('messages.newest_reply', [$dari, $sampai])
            ->select(
                'divisions.division',
                'messages.title',
                'messages.status',
                'messages.id',
                'messages.newest_reply',
                'messages.created_at',
            )
            ->where('messages.client_id', '=', $user_id)
            ->paginate(8);

        $tikets->appends(array('dari' => date($request->input('dari')), 'sampai' => date($request->input('sampai'))));

        $divisions = Division::all();
        return view('client.tiket')
            ->with('divisions', $divisions)
            ->with('messages', $tikets);
    }
}
