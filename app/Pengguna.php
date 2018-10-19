<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $fillable =   ['username','nama','password','email','alamat','telepon','status','role'];
    protected $hidden   =   ['password','remember_token','created_at','updated_at'];
}
