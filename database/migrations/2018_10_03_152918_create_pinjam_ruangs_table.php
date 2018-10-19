<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinjamRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam_ruangs', function (Blueprint $table) {
            $table->increments('kode_pinjam');
            $table->string('username','30');
            $table->string('kode_ruang','10');
            $table->string('tgl_pinjam');
            $table->string('waktu_mulai')->nullable();
            $table->string('waktu_akhir')->nullable();
            $table->text('keterangan');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('pinjam_ruangs',function(Blueprint $table){
            $table->foreign('username')->references('username')->on('penggunas');
            $table->foreign('kode_ruang')->references('kode_ruang')->on('ruangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjam_ruangs');
    }
}
