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

    protected $jan;
    protected $feb;
    protected $mar;
    protected $apr;
    protected $mei;
    protected $jun;
    protected $jul;
    protected $agu;
    protected $sep;
    protected $okt;
    protected $nov;
    protected $des;
    protected $jumlah_client;

    public function __construct()
    {
        $this->middleware('admin');

        $this->jumlah_client = Client::all()->count();

        $this->jan = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '01')
            ->count();

        $this->feb = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '02')
            ->count();

        $this->mar = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '03')
            ->count();

        $this->apr = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '04')
            ->count();

        $this->mei = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '05')
            ->count();

        $this->jun = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '06')
            ->count();

        $this->jul = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '07')
            ->count();

        $this->agu = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '08')
            ->count();

        $this->sep = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '09')
            ->count();

        $this->okt = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '10')
            ->count();

        $this->nov = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '11')
            ->count();

        $this->des = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '12')
            ->count();
    }

    public function index()
    {

        // $bulan = array();

        // for ($i = 1; $i < 13; $i++) {

        //     $bulan[] = Tiket::whereYear('created_at', '=',  date('Y'))
        //         ->whereMonth('created_at', '=', $i)
        //         ->count();
        // }

        $technology = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '1')
            ->where('divisi_id', '=', 1)
            ->count();
        $marketing = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '1')
            ->where('divisi_id', '=', 2)
            ->count();
        $human_resource = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '1')
            ->where('divisi_id', '=', 3)
            ->count();
        $finance = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', '1')
            ->where('divisi_id', '=', 4)
            ->count();

        return view('admin.dashboard')
            ->with('jumlah_client', $this->jumlah_client)
            ->with('jan', $this->jan)
            ->with('feb', $this->feb)
            ->with('mar', $this->mar)
            ->with('apr', $this->apr)
            ->with('mei', $this->mei)
            ->with('jun', $this->jun)
            ->with('jul', $this->jul)
            ->with('agu', $this->agu)
            ->with('sep', $this->sep)
            ->with('okt', $this->okt)
            ->with('nov', $this->nov)
            ->with('des', $this->des)
            ->with('technology', $technology)
            ->with('marketing', $marketing)
            ->with('human_resource', $human_resource)
            ->with('finance', $finance);
    }

    public function divisi_bulan($bulan)
    {

        $bulan_convert = '';

        switch ($bulan) {
            case 'januari':
                $bulan_convert = 1;
                break;
            case 'februari':
                $bulan_convert = 2;
                break;
            case 'maret':
                $bulan_convert = 3;
                break;
            case 'april':
                $bulan_convert = 4;
                break;
            case 'mei':
                $bulan_convert = 5;
                break;
            case 'juni':
                $bulan_convert = 6;
                break;
            case 'juli':
                $bulan_convert = 7;
                break;
            case 'agustus':
                $bulan_convert = 8;
                break;
            case 'september':
                $bulan_convert = 9;
                break;
            case 'oktober':
                $bulan_convert = 10;
                break;
            case 'november':
                $bulan_convert = 11;
                break;
            case 'desember':
                $bulan_convert = 12;
                break;
        }


        $technology = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', $bulan_convert)
            ->where('divisi_id', '=', 1)
            ->count();
        $marketing = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', $bulan_convert)
            ->where('divisi_id', '=', 2)
            ->count();
        $human_resource = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', $bulan_convert)
            ->where('divisi_id', '=', 3)
            ->count();
        $finance = Tiket::whereYear('created_at', '=',  date('Y'))
            ->whereMonth('created_at', '=', $bulan_convert)
            ->where('divisi_id', '=', 4)
            ->count();

        return view('admin.dashboard')
            ->with('jumlah_client', $this->jumlah_client)
            ->with('jan', $this->jan)
            ->with('feb', $this->feb)
            ->with('mar', $this->mar)
            ->with('apr', $this->apr)
            ->with('mei', $this->mei)
            ->with('jun', $this->jun)
            ->with('jul', $this->jul)
            ->with('agu', $this->agu)
            ->with('sep', $this->sep)
            ->with('okt', $this->okt)
            ->with('nov', $this->nov)
            ->with('des', $this->des)
            ->with('bulan', $bulan)
            ->with('technology', $technology)
            ->with('marketing', $marketing)
            ->with('human_resource', $human_resource)
            ->with('finance', $finance);
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
