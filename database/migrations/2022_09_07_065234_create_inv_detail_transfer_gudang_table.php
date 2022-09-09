<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvDetailTransferGudangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_detail_transfer_gudang', function (Blueprint $table) {
            $table->bigIncrements('id_detail_transfer_gudang');
            $table->integer('id_material');
            $table->integer('quantity_permintaan');
            $table->integer('total')->nullable()->default(null)->comment('pada saat permintaan, total = aktual harga real q_permintaan pada saat pengiriman, total = aktual harga real q_pengiriman');
            $table->integer('quantity_pengiriman')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
            $table->tinyInteger('status_approval',4);
            $table->integer('id_transfer_gudang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_detail_transfer_gudang');
    }
}
