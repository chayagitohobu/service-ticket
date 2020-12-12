<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Tiket;
use App\Models\Divisi;

class OperatorTiketController extends Controller
{

    public function __construct()
    {
        $this->middleware('operator');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                'tikets.created_at',
                'tikets.balasan_terbaru',
                'tikets.id'
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

        return view('operator.tiket')
            ->with('namas', $namas)
            ->with('tikets', $tikets)
            ->with('divisi', $divisi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user =  Auth::guard('user')->user();
        $divisis = Divisi::all();

        return view('operator.create_tiket')
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
                $remove = ['"', '[', ']', ','];
                $files_name_replaced = str_replace($remove, ' ', $filename);
                $file->move(storage_path('files'), $files_name_replaced);
                $files[] = $files_name_replaced;
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
        $tiket->balasan_terbaru = now();
        $tiket->save();

        return redirect('operator/tiket')->with('success', 'Tiket berhasil di buat !!');
    }

    public function tutupTiket($id)
    {
        $tiket = Tiket::find($id);
        $tiket->status = 'Tutup';
        $tiket->save();
        return redirect('client/tiket')->with('success', 'Tiket berhasil di tutup !!');
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
                'balasans.balasan',
                'balasans.id',
                'balasans.file'
            )
            ->orderBy('balasans.created_at', 'DESC')
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

        return view('operator.balasan')
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
        return view('operator.edit_tiket');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
