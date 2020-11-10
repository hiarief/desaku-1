<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Familycards;
use App\Gambar;
use PDF;
class suratController extends Controller
{
    public function surattdkmampu()
    {
        // $gambar = DB::table('gambar')->get();
       $gambar =Gambar::where('file','1584607753_cd.jpg')->get();
    //    = Familycards::where('jenis_kelamin','LAKI LAKI')->get();
    	return view('suratsurat.tidakmampu',compact('gambar'));
    }
}

