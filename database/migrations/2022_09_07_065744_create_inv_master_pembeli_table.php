<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMasterPembeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_master_pembeli', function (Blueprint $table) {
            $table->bigIncrements('id_pembeli');
            $table->integer('id_client');
            $table->string('nama_pembeli');
            $table->string('nama_kontak_person')->nullable()->default(null);
            $table->string('no_telp_person')->nullable()->default(null);
            $table->string('alamat_pembeli')->nullable()->default(null);
            $table->integer('id_regency')->nullable()->default(null);
            $table->integer('id_bank');
            $table->string('no_rekening')->nullable()->default(null);
            $table->string('atas_nama_bank')->nullable()->default(null);
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
        Schema::dropIfExists('inv_master_pembeli');
    }
}
