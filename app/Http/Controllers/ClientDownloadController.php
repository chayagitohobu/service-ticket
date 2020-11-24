<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function tiket_file_download(Request $request)
    {
        $file = $request->file;
        return response()->download(storage_path("files/{$file}"));
    }

    public function balasan_file_download(Request $request)
    {
        $file = $request->balasan_file;
        return response()->download(storage_path("files/{$file}"));
    }
}
