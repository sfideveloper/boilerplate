<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvReturnPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_return_penjualan', function (Blueprint $table) {
            $table->bigIncrements('id_return_penjualan');
            $table->integer('id_faktur_penjualan');
            $table->string('nomor_return_penjualan');
            $table->date('tanggal_dibuat');
            $table->string('alasan');
            $table->integer('biaya_lain');
            $table->integer('diskon');
            $table->tinyInteger('status_dikirim_kembali')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_return_penjualan');
    }
}
