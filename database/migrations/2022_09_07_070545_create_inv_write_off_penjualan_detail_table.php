<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvWriteOffPenjualanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_write_off_penjualan_detail', function (Blueprint $table) {
            $table->bigIncrements('id_write_off_penjualan_detail');
            $table->integer('id_write_off_penjualan');
            $table->integer('quantity');
            $table->integer('id_material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_write_off_penjualan_detail');
    }
}
