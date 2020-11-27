<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Tiket;
use App\Models\Divisi;
use App\Models\User;
use App\Models\Balasan;

class AdminTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $tikets = DB::table('tikets')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->select(
                'divisis.divisi',
                'tikets.judul',
                'tikets.status',
                'tikets.created_at',
                'tikets.balasan_terbaru',
                'tikets.id',
            )
            ->paginate(8);

        return view('admin.tiket')
            ->with('tikets', $tikets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $user =  auth()->user();
        $user =  Auth::guard('user')->user();
        $divisis = Divisi::all();
        return view('admin.create_tiket')
            ->with('divisis', $divisis)
            ->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(storage_path('files'), $filename);
                $files[] = $filename;
            }
        } else {
            $files = null;
        }

        if ($files == null) {
            $store_file = null;
        } else {
            $store_file = json_encode($files);
        }

        $tiket = new Tiket;
        $tiket->user_id = Auth::guard('user')->user()->id;
        $tiket->divisi_id = $request->input('divisi');
        $tiket->prioritas = $request->input('prioritas');
        $tiket->judul = $request->input('judul');
        $tiket->ket = $request->input('ket');
        $tiket->file = $store_file;
        $tiket->save();

        return redirect('admin/tiket')->with('success', 'Tiket berhasil di buat !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiket = DB::table('tikets')
            ->where('tikets.id', $id)
            ->leftJoin('users', 'tikets.user_id', '=', 'users.id')
            ->leftJoin('clients', 'tikets.client_id', '=', 'clients.id')
            ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
            ->select(
                'tikets.id',
                'tikets.status',
                'tikets.prioritas',
                'tikets.ket',
                'tikets.updated_at',
                'tikets.balasan_terbaru',
                'tikets.created_at',
                'tikets.file',
                'divisis.id as divisi_id',
                'divisis.divisi',
                'users.role_id',
                'clients.name as client_name',
                'users.name as user_name',
            )
            ->get()
            ->first();

        $balasans = DB::table('balasans')
            ->where('balasans.tiket_id', $id)
            ->leftJoin('users', 'balasans.user_id', '=', 'users.id')
            ->leftJoin('clients', 'balasans.client_id', '=', 'clients.id')
            ->select(
                'users.role_id',
                'users.name as user_name',
                'clients.name as client_name',
                'balasans.created_at',
                'balasans.id',
                'balasans.balasan',
                'balasans.file',
            )
            ->get();

        if (empty($tiket->file)) {
            $tiket_files = null;
        } else {
            $tiket_file = $tiket->file;
            $remove = ['"', '[', ']'];
            $tiket_file_remove = str_replace($remove, ' ', $tiket_file);

            $tiket_files = explode(',', $tiket_file_remove);
        }



        if (empty($balasans)) {
            $balasan_file_array = null;
        } else {
            foreach ($balasans as $balasan) {
                $balasan_file = $balasan->file;
                $remove = ['"', '[', ']'];
                $balasan_file_remove = str_replace($remove, ' ', $balasan_file);
                $balasan_file = explode(',', $balasan_file_remove);
                $balasan_file_array[] = $balasan_file;
            }
        }

        if (empty($balasan_file_array)) {
            $balasan_file_array = null;
        } else {
            $balasan_file_array[] = $balasan_file;
        }


        return view('admin.balasan')
            ->with('tiket', $tiket)
            ->with('balasans', $balasans)
            ->with('tiket_files', $tiket_files)
            ->with('balasan_file_array', $balasan_file_array);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::guard('user')->user();
        $divisis = Divisi::all();
        $tiket = Tiket::find($id);
        // $tiket = DB::table('tikets')
        //     ->where('tikets.id', '=', $id)
        //     ->join('divisis', 'tikets.divisi_id', '=', 'divisis.id')
        //     ->select('divisis.divisi', 'divisis.id as divisi_id', 'tikets.id', 'tikets.judul', 'tikets.ket', 'tikets.prioritas')
        //     ->get();

        return view('admin.edit_tiket')
            ->with('tiket', $tiket)
            ->with('user', $user)
            ->with('divisis', $divisis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(storage_path('files'), $filename);
                $files[] = $filename;
            }
        } else {
            $files = null;
        }

        if ($files == null) {
            $store_file = null;
        } else {
            $store_file = json_encode($files);
        }

        $tiket = Tiket::find($id);
        $tiket->user_id = Auth::guard('user')->user()->id;
        $tiket->divisi_id = $request->input('divisi');
        $tiket->prioritas = $request->input('prioritas');
        $tiket->judul = $request->input('judul');
        $tiket->ket = $request->input('ket');
        $tiket->file = $store_file;
        $tiket->save();

        return redirect('admin/tiket')->with('success', 'Tiket berhasil di update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = Tiket::find($id);
        $tiket->delete();

        return redirect('admin/tiket')->with('success', 'Tiket berhasil dihapus !!');
    }
}
