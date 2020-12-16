<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Divisi;
use App\Models\User;
use App\Models\Tiket;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $jan = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '01')
            ->count();

        $feb = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '02')
            ->count();

        $mar = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '03')
            ->count();

        $apr = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '04')
            ->count();

        $mei = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '05')
            ->count();

        $jun = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '06')
            ->count();

        $jul = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '07')
            ->count();

        $agu = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '08')
            ->count();

        $sep = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '09')
            ->count();

        $okt = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '10')
            ->count();

        $nov = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '11')
            ->count();

        $des = Tiket::whereYear('created_at', '=', '2020')
            ->whereMonth('created_at', '=', '12')
            ->count();

        // $bulan = array();

        // for ($i = 1; $i < 13; $i++) {

        //     $bulan[] = Tiket::whereYear('created_at', '=', '2020')
        //         ->whereMonth('created_at', '=', $i)
        //         ->count();
        // }
        $aktivitas_terbarus = DB::table('tikets')
            ->leftJoin('balasans', 'tikets.id', 'balasans.tiket_id')
            ->latest('tikets.balasan_terbaru', 'DESC')
            ->select('tikets.judul', 'tikets.balasan_terbaru')
            ->take(4)
            ->get();


        return view('admin.dashboard')
            ->with('jan', $jan)
            ->with('feb', $feb)
            ->with('mar', $mar)
            ->with('apr', $apr)
            ->with('mei', $mei)
            ->with('jun', $jun)
            ->with('jul', $jul)
            ->with('agu', $agu)
            ->with('sep', $sep)
            ->with('okt', $okt)
            ->with('nov', $nov)
            ->with('des', $des)
            ->with('aktivitas_terbarus', $aktivitas_terbarus);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  CREATE 
    public function create()
    {
        //
    }

    // CREATE END

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // STORE 

    public function store(Request $request)
    {
        //
    }

    // STORE END




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // READ

    public function show()
    {
        $user_id = Auth::guard('user')->user()->id;
        $user = DB::table('users')
            ->where('users.id', '=', $user_id)
            ->leftJoin('divisis', 'users.divisi_id', 'divisis.id')
            ->select('users.name', 'users.email', 'users.telp', 'divisis.divisi')
            ->get()
            ->first();

        return view('admin.profile')->with('user', $user);
    }
    // READ END

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // EDIT 
    public function edit($id)
    {
        return view('admin.edit_profile');
    }
    // EDIT END

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //  UPDATE
    public function update(Request $request, $id)
    {
        //
    }

    // UPDATE END

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  DESTROY

    public function destroy($id)
    {
        //
    }
    // DESTROY END


}
