<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function majors()
    {
        //setiap profil memiliki satu prodi
        return $this->hasMany(Majors::class);
    }
}
