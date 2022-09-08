<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvFakturPenjualanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_faktur_penjualan_detail', function (Blueprint $table) {
            $table->bigIncrements('id_faktur_penjualan_detail');
            $table->integer('id_faktur_penjualan');
            $table->integer('quantity');
            $table->integer('id_material')->nullable()->default(null);
            $table->integer('harga_satuan');
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
        Schema::dropIfExists('inv_faktur_penjualan_detail');
    }
}
