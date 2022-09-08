<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMasterGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_master_gudang', function (Blueprint $table) {
            $table->bigIncrements('id_gudang');
            $table->integer('id_client');
            $table->integer('id_proyek');
            $table->string('kode_gudang');
            $table->string('nama_gudang');
            $table->string('lokasi_gudang');
            $table->tinyInteger('status_aktif')->nullable()->default(1);
            $table->dateTime('registered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_master_gudang');
    }
}
