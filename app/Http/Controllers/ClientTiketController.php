<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Path\To\DOMdocument;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Divisi;
use App\Models\Tiket;


class ClientTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {

        $user_id = Auth::guard('client')->user()->id;
        $tikets = DB::table('tikets')
            ->where('tikets.client_id', '=', $user_id)
            ->join('divisis', 'tikets.divisi_id', 'divisis.id')
            ->select(
                'tikets.id',
                'tikets.judul',
                'tikets.status',
                'tikets.created_at',
                'tikets.balasan_terbaru',
                'divisis.divisi'
            )
            ->paginate(8);

        $divisis = Divisi::all();
        return view('client.tiket')
            ->with('divisis', $divisis)
            ->with('tikets', $tikets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user =  Auth::guard('client')->user();
        $divisis = Divisi::all();

        return view('client.create_tiket')
            ->with('user', $user)
            ->with('divisis', $divisis);
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

        if (!empty($request->ket)) {
            $storage = 'storage/tiket';
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            // $dom->loadHTML($request->ket, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom->loadHTML($request->ket);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $group);
                    $mimetype = $group['mime'];
                    $fileNameContent = uniqid();
                    $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                    $filepath = ("$storage/$fileNameContentRand.$mimetype");
                    $image = Image::make($src)
                        ->encode($mimetype, 100)
                        ->save($filepath);
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                    $img->setAttribute('class', 'img-fluid');
                }
            }
        }

        $tiket = new Tiket;
        $tiket->judul = $request->input('judul');
        // $tiket->ket = $request->input('ket');
        if (!empty($request->ket)) {
            $tiket->ket = $dom->saveHTML();
        } else {
            $tiket->ket = null;
        }
        $tiket->prioritas = $request->input('prioritas');
        $tiket->status = 'Buka';
        $tiket->divisi_id = $request->input('divisi');
        $tiket->client_id = Auth::guard('client')->user()->id;
        $tiket->file = $store_file;
        $tiket->balasan_terbaru = now();
        $tiket->save();

        return redirect('client/tiket')->with('success', 'Tiket berhasil dibuat !');
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

        if (empty($tiket->file)) {
            $tiket_files = null;
        } else {
            $tiket_file = $tiket->file;
            $remove = ['"', '[', ']'];
            $tiket_file_remove = str_replace($remove, ' ', $tiket_file);

            $tiket_files = explode(',', $tiket_file_remove);
        }

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
                'balasans.file',
                'balasans.id'
            )
            ->orderBy('balasans.created_at', 'DESC')
            ->get();

        if (empty($balasans)) {
            $balasan_file_array = null;
        } else {
            foreach ($balasans as $balasan) {
                // if (empty($balasan->file)) {
                //     $balasan_file_array = null;
                // } else {
                $balasan_file = $balasan->file;
                $remove = ['"', '[', ']'];
                $balasan_file_remove = str_replace($remove, ' ', $balasan_file);
                $balasan_file = explode(',', $balasan_file_remove);
                $balasan_file_array[] = $balasan_file;
                // }
            }
        }

        if (empty($balasan_file_array)) {
            $balasan_file_array = null;
        } else {
            $balasan_file_array[] = $balasan_file;
        }

        return view('client.balasan')
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
        //
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
