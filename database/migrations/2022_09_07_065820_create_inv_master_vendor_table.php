<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMasterVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_master_vendor', function (Blueprint $table) {
            $table->bigIncrements('id_vendor');
            $table->integer('id_client');
            $table->string('nama_vendor',255);
            $table->string('nama_kontak_person',150);
            $table->string('no_telp_person',20);
            $table->string('alamat_vendor',255);
            $table->integer('id_regency');
            $table->integer('id_bank');
            $table->string('no_rekening',50);
            $table->string('atas_nama_bank',150);
            $table->string('no_mou',100)->nullable()->default(null);
            $table->integer('hari_jatuh_tempo')->nullable()->default(null);
            $table->integer('hari_diskon')->nullable()->default(null);
            $table->integer('diskon_awal')->nullable()->default(null);
            $table->integer('denda_keterlambatan')->nullable()->default(null);
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
        Schema::dropIfExists('inv_master_vendor');
    }
}
