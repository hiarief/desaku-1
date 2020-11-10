<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Familycards;

use App\Surats;

use PDF;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $kk = Familycards::groupby('kk')->paginate();
       $kk = Familycards::groupBy('kk')
       ->selectRaw('count(*) as total, kk')
       ->get();
       
       $nik = DB::table('familycards')->paginate();
       $perempuan = Familycards::where('jenis_kelamin','PEREMPUAN')->get();
       $laki2 = Familycards::where('jenis_kelamin','LAKI LAKI')->get();

       $data= [
           'kk'=>$kk,
           'nik'=>$nik,
           'perempuan'=>$perempuan,
           'laki2'=>$laki2
       ];


       return view('layout.cont',$data);

    }
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminhome()
    {
        $surats = autonumber_date('surats','nomor','SKBM-','tglentry','tglentry');
             
        // return view('familycards.index');
        $familycards = DB::table('familycards')->where('nik', Auth::user()->nik)->paginate(5);
        
        $darafamily = Familycards::where('nik', Auth::user()->nik)->get();

        

        return view('user.adminhome',compact('familycards','surats','darafamily'));
    }
}
