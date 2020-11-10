<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surats extends Model

{
    protected $table = "surats";
    // protected $fillable adalah data yang boleh di isi
    // protected $guarded adalah data yang tidak boleh di sisi
    //supaya tidak ada celah yang mengirsim data http
    protected $fillable = ['nomor','nik','nama','jenis'];
    
  
}