<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvTransferGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_transfer_gudang', function (Blueprint $table) {
            $table->bigIncrements('id_transfer_gudang');
            $table->integer('id_gudang_pengirim');
            $table->string('nomor_permintaan',50);
            $table->dateTime('tanggal_permintaan');
            $table->tinyInteger('status_approval',4)->default(0)->comment('0 : no need approval 1 : need approval 2 : approved');
            $table->date('registered');
            $table->integer('id_gudang_penerima');
            $table->tinyInteger('status_transit',4)->default(0)->comment('0 : belum dikirim 1 : perjalanan 2 : diterima');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_transfer_gudang');
    }
}
