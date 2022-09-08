<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvFakturPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_faktur_po', function (Blueprint $table) {
            $table->bigIncrements('id_faktur_po');
            $table->integer('id_po');
            $table->string('no_faktur');
            $table->date('tanggal_diterima');
            $table->string('nama_pengirim');
            $table->string('status');
            $table->text('catatan')->nullable()->default(null);
            $table->integer('biaya_lain_pembelian')->nullable()->default(null);
            $table->integer('diskon_pembelian')->nullable()->default(null);
            $table->integer('biaya_lain_pembatalan')->nullable()->default(null);
            $table->integer('diskon_pembatalan')->nullable()->default(null);
            $table->integer('total')->nullable()->default(null);
            $table->integer('dibayar')->nullable()->default(null);
            $table->tinyInteger('status_return',4)->nullable()->default(0);
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
        Schema::dropIfExists('inv_faktur_po');
    }
}
