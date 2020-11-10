<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Posts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // public function databerita(){
	// 	$posts = Posts::get();
	// 	return view('berita.databerita',compact('posts'));
    // }
    public function hotnews(){
		
        // $posts = DB::table('posts')->paginate(3);

        $posts = DB::table('posts as a')
         ->join('users as b','a.nik','=','b.nik')
         ->select('a.file', 'a.judul', 'a.id', 'b.name', 'a.created_at', 'a.keterangan')   
         ->paginate(3);
        

        $postslimit = DB::table('posts')->limit(4)->get();


		return view('berita.berita0',compact('posts','postslimit'));
    }

    public function databerita1($id)
    {
        $posts = DB::table('posts as a')
         ->join('users as b','a.nik','=','b.nik')
         ->where('a.id',$id)->first();

        // $posts = DB::table('posts')->find($id);

          $postslimit = DB::table('posts')->limit(4)->get();


        return view('berita.berita1',compact('posts','postslimit'));

    }
    public function databerita()
    {
        $posts = Posts::get();


        return view('berita.databerita',compact('posts'));

    }
 
	public function proses_upload(Request $request){
		$this->validate($request, [
            'judul' => 'required|unique:posts|max:255',
        	'keterangan' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'nik' => 'required',
		
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		Posts::create([
			'judul' => $request->judul,
			'keterangan' => $request->keterangan,
            'file' => $nama_file,
            'nik' => $request->nik,
		]);
 
        return redirect('/berita')->with('status','Data Berita Berhasil Ditambahkan!');
	}
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
        return view('berita.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
