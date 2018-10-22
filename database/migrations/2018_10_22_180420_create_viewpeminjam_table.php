<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewpeminjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('create view ruang_view as select a.kode_pinjam,b.nama,b.username,b.role,a.kode_ruang,a.tgl_pinjam,a.waktu_mulai,a.waktu_akhir,a.keterangan,a.status from pinjam_ruangs a inner join penggunas b on a.username = b.username');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewpeminjam');
    }
}
