<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Familycards extends Model
{
 
    protected $table = "familycards";
    // protected $fillable adalah data yang boleh di isi
    // protected $guarded adalah data yang tidak boleh di sisi
    //supaya tidak ada celah yang mengirim data http

    protected $fillable = ['kk','nik','nama','tempat_lahir','tgl_lahir','status_perkawinan','jenis_kelamin','alamat','pekerjaan','rt','rw'
]; 

// public function surats(){
//     return $this->belongsToMany('App\Surats','familycards','nik','nik');
// }

}