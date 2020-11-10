<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Familycards;
use App\Posts;
class ControllerFrontend extends Controller
{
    // public function index()
    // {    

    //     $posts = DB::table('posts')->paginate(3);

    //     $postslimit = DB::table('posts')->limit(4)->get();


    //     return view('frontend.index',compact('posts','postslimit'));

    // }
   
    public function cek()
        {
           // $kk = Familycards::groupby('kk')->paginate();
            $kk = familycards::groupBy('kk')
            ->selectRaw('count(*) as total, kk')
            ->get();
            
            $nik = DB::table('familycards')->get();
            $perempuan = familycards::where('jenis_kelamin','P')->get();
            $laki2 = familycards::where('jenis_kelamin','L')->get();

            $data= [
                'kk'=>$kk,
                'nik'=>$nik,
                'perempuan'=>$perempuan,
                'laki2'=>$laki2
            ];


            return view('layout.cont',$data);
        }
    public function pemerintah()
    {
        return view('frontend.pemerintah');
    }
    public function bpd()
    {
        return view('frontend.bpd');
    }
    public function visimisi()
    {
        return view('frontend.visimisi');
    }
    public function lpm()
    {
        $posts = DB::table('posts')->paginate(3);

        $postslimit = DB::table('posts')->limit(4)->get();

        return view('frontend.lpm',compact('posts','postslimit'));
    }
    public function defnaker()
    {
        return view('frontend.job');
    }
    public function pkk()
    {
        return view('frontend.pkk');
    }

}
