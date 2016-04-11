<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengajuanIzin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuanizins', function (Blueprint $table) {
            $table->increments('id_pengajuan_surat');
            $table->string('username')->references('username')->on('users');
            $table->timestamps('waktu_pengajuan');
            $table->string('email');
            $table->string('no_hp');
            $table->string('status', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pengajuanizins');
    }
}
