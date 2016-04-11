<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIzinkegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('izinkegiatans', function (Blueprint $table) {
            $table->integer('id_pengajuan_surat')->references('id_pengajuan_surat')->on('pengajuanizins');
            $table->integer('id_kegiatan')->references('id_kegiatan')->on('kegiatans');
            $table->primary(['id_pengajuan_surat', 'id_kegiatan']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('izinkegiatans');
    }
}
