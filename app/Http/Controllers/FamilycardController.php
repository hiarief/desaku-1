<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Familycards;
use App\Posts;

use PDF;

use Illuminate\Http\Request;

class FamilycardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // return view('familycards.index');
         $familycards = DB::table('familycards')->paginate(10);

        //  $posts = DB::table('posts')->paginate(10);
         // $familycards = Familycards::all(); 
       return view('familycards.index',compact('familycards'));
    }
    public function cetak_pdf()
    {
    	$familycards = Familycards::where('jenis_kelamin','L')->get();
 
    	$pdf = PDF::loadview('familycards.pdf',['familycards'=>$familycards])->setPaper('Legal', 'landscape');
    	//return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }

    public function cari(Request $request)
    {
        //menangkap data pencarian
        $cari=$request->cari;

        //mengambil data dari tabel familycards  sesuai pencarian data
        $familycards=DB::table('familycards')
        ->where('kk','like',"%".$cari."%")
        ->paginate(10);

        //mengirim data familycards ke view index
        return view('familycards.index',['familycards'=>$familycards]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('familycards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          // validasi
          $request->validate([
            'kk' => 'required',
            'nik'  => 'required|size:16',
            'nama'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'status_perkawinan'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
            'pekerjaan'=>'required',
            'rt'=> 'required',
            'rw'=> 'required'
            

        ]);
          //CARA KE TIGA
          familycards::create($request->all());
          return redirect('/family')->with('status','Data KK Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Familycards  $familycards
     * @return \Illuminate\Http\Response
     */
    public function show(Familycards $familycard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Familycards  $familycards
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $familycards = familycards::find($id)->get();
        return view('familycards.edit',compact('familycards'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Familycard  $familycards
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'kk' => 'required',
            'nik'  => 'required|size:9',
            'nama'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'status_perkawinan'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
            'pekerjaan'=> 'required',
            'rt'=> 'required',
            'rw'=> 'required'
        ]);
     
        $familycard = Familycards::find($id);
        $familycard->kk = $request->kk;
        $familycard->nik = $request->nik;
        $familycard->nama = $request->nama;
        $familycard->tempat_lahir = $request->tempat_lahir;
        $familycard->tgl_lahir = $request->tgl_lahir;
        $familycard->status_perkawinan = $request->status_perkawinan;
        $familycard->jenis_kelamin = $request->jenis_kelamin;
        $familycard->alamat = $request->alamat;
        $familycard->pekerjaan = $request->pekerjaan;
        $familycard->rt = $request->rt;
        $familycard->rw = $request->rw;
        $familycard->save();
        return redirect('/family')->with('status','Data KK Berhasil Di Ubah!');
    }

    public function delete($id)
        {
            $familycard = Familycards::find($id);
            $familycard->delete();
            return redirect('/family')->with('status','Data KK Berhasil Di Hapus!');
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Familycard  $familycard
     * @return \Illuminate\Http\Response
     */

    public function destroy(Familycard $familycard)
    {
        //
    }
    //PENDUDUK
    public function penduduk()
    {

       // return view('familycards.index');
         $familycards = DB::table('familycards')->paginate(10);
         // $familycards = Familycards::all(); 
       return view('penduduk.index',['familycards'=> $familycards]);
    }
    public function caripenduduk(Request $request)
    {
        //menangkap data pencarian
        $cari=$request->cari;

        //mengambil data dari tabel familycards  sesuai pencarian data
        $familycards=DB::table('familycards')
        ->where('nik','like',"%".$cari."%")
        ->paginate(10);

        //mengirim data familycards ke view index
        return view('penduduk.index',['familycards'=>$familycards]);
    }

    public function perempuan()
    {

       // return view('familycards.index');
         //$familycards = DB::table('familycards')->paginate(10);
         $familycards = DB::table('familycards')->paginate(10);
         // $familycards = Familycards::all(); 
       return view('penduduk.perempuan',['familycards'=> $familycards]);
    }
    public function cariperempuan(Request $request)
    {
        //menangkap data pencarian
        $cari=$request->cari;

        //mengambil data dari tabel familycards  sesuai pencarian data
        $familycards=DB::table('familycards')
        ->where('jenis_kelamin','like',"%".$cari."%")
        ->paginate(10);

        //mengirim data familycards ke view index
        return view('penduduk.perempuan',['familycards'=>$familycards]);
    }
    public function skbmenikah()
    {
         
       // return view('familycards.index');
         $darafamily = Familycards::where('nik', Auth::user()->nik)->get();
         // $familycards = Familycards::all(); 
       return view('suratsurat.databelummenikah', compact('darafamily'));
    }

}
