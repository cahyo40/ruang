<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinjamRuang extends Model
{
    protected $fillable =   ['username','kode_ruang','tgl_pinjam','waktu_mulai','waktu_akhir','keterangan','status'];
}
