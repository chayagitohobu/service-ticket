<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Balasan;
use App\Models\Tiket;

class OperatorBalasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $user = Auth::guard('user')->user();

        if (empty($user->divisi_id)) {
            $user_divisi_id = null;
        } else {
            $user_divisi_id = $user->divisi_id;
        }

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

        $balasan = new Balasan;
        $balasan->tiket_id = $request->input('tiket_id');
        $balasan->divisi_id = $user_divisi_id;
        $balasan->user_id = $user->id;
        $balasan->balasan = $request->input('balasan');
        $balasan->file = $store_file;
        $balasan->save();

        $tiket = Tiket::find($request->input('tiket_id'));
        $tiket->balasan_terbaru = now();
        $tiket->status = 'Balasan operator';
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
