<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Balasan;
use App\Models\Tiket;
use PDO;
use Path\To\DOMdocument;
use Intervention\Image\ImageManagerStatic as Image;


class ClientBalasanController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();

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

        if (!empty($request->balasan)) {
            $storage = 'storage/tiket';
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            // $dom->loadHTML($request->balasan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom->loadHTML($request->balasan);
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

        $balasan = new Balasan;
        $balasan->tiket_id = $request->input('tiket_id');
        $balasan->client_id = $client->id;
        // $balasan->balasan = $request->input('balasan');
        if (!empty($request->balasan)) {
            $balasan->balasan = $dom->saveHTML();
        } else {
            $balasan->balasan = null;
        }
        $balasan->file = $store_file;

        $balasan->save();

        $tiket = Tiket::find($request->input('tiket_id'));
        $tiket->balasan_terbaru = now();
        $tiket->status = 'Balasan client';
        $tiket->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
