<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sbd extends Model
{
    //
    protected $table ="sbd";
    
    protected $fillable = ['nomor','nik','jenis'];
}
