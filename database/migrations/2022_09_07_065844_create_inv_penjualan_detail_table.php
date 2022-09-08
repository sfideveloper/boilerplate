<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvPenjualanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_penjualan_detail', function (Blueprint $table) {
            $table->bigIncrements('id_penjualan_detail');
            $table->integer('id_material');
            $table->integer('quantity');
            $table->integer('harga_satuan');
            $table->integer('id_penjualan');
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
        Schema::dropIfExists('inv_penjualan_detail');
    }
}
