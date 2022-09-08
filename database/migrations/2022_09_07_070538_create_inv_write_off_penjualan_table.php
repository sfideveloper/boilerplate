<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvWriteOffPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_write_off_penjualan', function (Blueprint $table) {
            $table->bigIncrements('id_write_off_penjualan');
            $table->integer('id_penjualan');
            $table->date('tanggal_dibuat');
            $table->string('alasan');
            $table->integer('biaya_lain');
            $table->integer('diskon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_write_off_penjualan');
    }
}
