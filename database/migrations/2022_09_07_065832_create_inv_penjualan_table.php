<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_penjualan', function (Blueprint $table) {
            $table->bigIncrements('id_penjualan');
            $table->integer('id_pembeli');
            $table->string('nomor_penjualan',50);
            $table->integer('tanggal_dibuat');
            $table->integer('biaya_lain');
            $table->integer('diskon');
            $table->integer('id_client');
            $table->integer('id_gudang');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_penjualan');
    }
}
