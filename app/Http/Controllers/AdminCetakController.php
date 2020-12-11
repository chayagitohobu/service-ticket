<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCetakController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function tiket()
    {
        return view('admin.preview.tiket');
    }

    public function user()
    {
        return view('admin.preview.user');
    }

    public function client()
    {
        return view('admin.preview.client');
    }

    public function divisi()
    {
        return view('admin.preview.divisi');
    }
}
