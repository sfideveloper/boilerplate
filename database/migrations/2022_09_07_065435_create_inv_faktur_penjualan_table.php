<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvFakturPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_faktur_penjualan', function (Blueprint $table) {
            $table->bigIncrements('id_faktur_penjualan');
            $table->integer('id_penjualan');            
            $table->integer('nomor_faktur');
            $table->date('tanggal_dikirim');
            $table->string('nama_pengirim',150);
            $table->date('jatuh_tempo');
            $table->integer('biaya_lain');
            $table->integer('diskon');
            $table->integer('total')->nullable()->default(null);
            $table->char('status_return',1)->nullable()->default(0);
            $table->tinyInteger('status_lunas_bayar',4)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_faktur_penjualan');
    }
}
