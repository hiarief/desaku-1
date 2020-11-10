<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $table = "akses";
    // public function User(){
    // 	return $this->belongsToMany('App\User','is_admin','Akses','id');
    // }
    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
    // }
}
