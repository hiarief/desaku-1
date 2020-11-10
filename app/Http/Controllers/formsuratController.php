<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Familycards;

use App\Surats;
use App\Sktms;
use App\Skdm;
use App\Skb;
use App\Sbd;

use PDF;
use Validator;
use Response;

use Illuminate\Http\Request;


class formsuratController extends Controller
{

  protected $rules =
  [
    'nomor'  => 'required|max:20',
    'nik'  => 'required|max:26',
    'nama'=> 'required|max:255',
    'jenis'=> 'required|max:255'
  ];
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    //////// belum menikah/////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
     public function belummenikah()
    {

        $surats = autonumber_date('surats','nomor','SKBM-','tglentry','tglentry');
     //  $familycard = Familycards::where('nik', Auth::user()->nik)->paginate(1);
       $familycard = DB::table('familycards')->where('nik',Auth::user()->nik)->paginate(5);

        $familycards = DB::table('familycards as a')
        ->join('surats as b','a.nik','=','b.nik')
        ->select('a.id', 'a.nik', 'a.nama')   
        ->where('a.nik',Auth::user()->nik)
        ->where('jenis','SKBM')
        ->get();
        

       $suratdata = Surats::where('nik', Auth::user()->nik)->orwhere('jenis','SKBM')->paginate(5);
       
      return view('suratsurat.belummenikah',compact('surats','familycard','familycards','suratdata'));
    // dd($users);
      //   var_dump($methods);
      //   print_r($methods);
     }
       
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Familycards  $familycards
     * @return \Illuminate\Http\Response
     */
    public function belummenikahedit($nik)
    {
          $familycards = familycards::find($nik);   
        return view('suratsurat.belummenikah',['familycard'=>$familycards]);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
         // // validasi
      
     
      $validasi = Validator::make($request->all(),$this->rules);
      if($validasi->fails())
      {
          $json['errors'] = $validasi->getMessageBag()->toArray();
          # eta pessan error validasi tinggal dilempar
      }
      else
      {
        $count = Surats::where('nik',$request->nik)
        ->where('jenis',$request->jenis)
        ->count();
        if($count==0)
        {
            $insert = Surats::create($request->all());
        }
        else
        {
          return redirect('/suratmenikah')->with('status','Data Surat dengan nomor nik '.$request->nik.' telah tersedia pada database !!');
        }
      }
      
      
        return redirect('/suratmenikah')->with('status','Data Surat Berhasil Disimpan!');
    }
    public function cetaksuratskbm($id)
    {

      $familycards = DB::table('familycards as a')
                      ->join('surats as b','a.nik','=','b.nik')
                      ->where('a.id',$id)->first();
                  
               

    // $familycards = Familycards::find($id);
 
    	$pdf = PDF::loadview('suratsurat.belummenikahcetak',compact('familycards'))->setPaper('a4', 'portrait');
      return $pdf->stream();
    }
    /////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    //////// SURAT KETERANGAN TIDAK MAMPU/////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    public function sktmampu()
    {
      $sktms = autonumber_date('sktms','nomor','SKTM-','tglentry','tglentry');
      //  $familycard = Familycards::where('nik', Auth::user()->nik)->paginate(1);
        $familycard = DB::table('familycards')->where('nik',Auth::user()->nik)->paginate(1);
 
         $familycards = DB::table('familycards as a')
         ->join('sktms as b','a.nik','=','b.nik')
         ->select('a.id', 'a.nik', 'a.nama')   
         ->where('a.nik',Auth::user()->nik)
         ->where('jenis','SKTM')
         ->paginate(1);
         
        
        return view('suratsurat.surattidakmampuform',compact('sktms','familycard','familycards'));
      // dd($surats);
      }

    public function storesktmpu(Request $request)
    {      
       // validasi
       $request->validate([
        'nomor' => 'required',
        'nik'  => 'required|unique:sktms|max:50',
        'jenis'=> 'required'
    ]);
      //CARA KE TIGA
      Sktms::create($request->all());    
      return redirect('/sktmampu')->with('status','Data Surat dengan nomor nik '.$request->nik.' telah tersimpan !!');
    }

    /////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    //////// SURAT DOMISILI/////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    public function suratketerangandomisili()
    {
      $skdm = autonumber_date('skdm','nomor','SKDM-','tglentry','tglentry');
      //  $familycard = Familycards::where('nik', Auth::user()->nik)->paginate(1);
        $familycard = DB::table('familycards')->where('nik',Auth::user()->nik)->paginate(1);

        $familycards = DB::table('familycards as a')
        ->join('skdm as b','a.nik','=','b.nik')
        ->select('a.id', 'a.nik', 'a.nama')   
        ->where('a.nik',Auth::user()->nik)
        ->where('jenis','SKDM')
        ->paginate(1);

        return view('suratsurat.suratketerangandomisili',compact('skdm','familycard','familycards'));
    }
    public function storeskdm(Request $request)
    {      
       // validasi
       $request->validate([
        'nomor' => 'required',
        'nik'  => 'required|unique:skdm|max:50',
        'jenis'=> 'required'
    ]);
      //CARA KE TIGA
      Skdm::create($request->all());    
      return redirect('/suratketerangandomisili')->with('status','Data Surat dengan nomor nik '.$request->nik.' Berhasil Disimpan !!');
    }
        /////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    //////// SURAT KELAKUAN BAIK/////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    public function suratkelakuanbaik()
    {
      $skb = autonumber_date('skb','nomor','SKB-','tglentry','tglentry');
      //  $familycard = Familycards::where('nik', Auth::user()->nik)->paginate(1);
        $familycard = DB::table('familycards')->where('nik',Auth::user()->nik)->paginate(1);

        $familycards = DB::table('familycards as a')
        ->join('skb as b','a.nik','=','b.nik')
        ->select('a.id', 'a.nik', 'a.nama')   
        ->where('a.nik',Auth::user()->nik)
        ->where('jenis','SKB')
        ->paginate(1);
        
        return view('suratsurat.suratkelakuanbaik',compact('skb','familycard','familycards'));
    }
    public function storeskb(Request $request)
    {      
       // validasi
       $request->validate([
        'nomor' => 'required',
        'nik'  => 'required|unique:skb|max:50',
        'jenis'=> 'required'
    ]);
      //CARA KE TIGA
      Skb::create($request->all());    
      return redirect('/suratkelakuanbaik')->with('status','Data Surat dengan nomor nik '.$request->nik.' Berhasil Disimpan !!');
    }
    /////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    //////// SURAT BERSIH DIRI/////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////
    public function suratbersihdiri()
    {
        $sbd = autonumber_date('sbd','nomor','SBD-','tglentry','tglentry');
        //  $familycard = Familycards::where('nik', Auth::user()->nik)->paginate(1);
        $familycard = DB::table('familycards')->where('nik',Auth::user()->nik)->paginate(1);

        $familycards = DB::table('familycards as a')
        ->join('sbd as b','a.nik','=','b.nik')
        ->select('a.id', 'a.nik', 'a.nama')   
        ->where('a.nik',Auth::user()->nik)
        ->where('jenis','SBD')
        ->paginate(1);
     
        return view('suratsurat.suratbersihdiri',compact('sbd','familycard','familycards'));
    }
    public function storesbd(Request $request)
    {      
       // validasi
       $request->validate([
        'nomor' => 'required',
        'nik'  => 'required|unique:sbd|max:50',
        'jenis'=> 'required'
    ]);
      //CARA KE TIGA
      Sbd::create($request->all());    
      return redirect('/suratbersihdiri')->with('status','Data Surat dengan nomor nik '.$request->nik.' Berhasil Disimpan !!');
    }
}
