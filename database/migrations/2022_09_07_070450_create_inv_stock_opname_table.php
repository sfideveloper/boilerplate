<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvStockOpnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_stock_opname', function (Blueprint $table) {
            $table->bigIncrements('id_stock_opname');
            $table->string('nomor_stock_opname');
            $table->integer('id_gudang');
            $table->date('date_start');
            $table->date('date_end');
            $table->tinyInteger('status_stock_opname')->default(0)->comment('0 : belum dimulai 1 : dimulai 2 : selesai');
            $table->integer('pengecekan_ke')->default(1);
            $table->date('registered')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_stock_opname');
    }
}
