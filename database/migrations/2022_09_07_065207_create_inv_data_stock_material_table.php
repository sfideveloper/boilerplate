<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvDataStockMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_data_stock_material', function (Blueprint $table) {
            $table->bigIncrements('id_data_stock_material');
            $table->integer('id_faktur_po')->nullable()->default(null);
            $table->integer('id_permintaan_material')->nullable()->default(null);
            $table->integer('id_pengembalian_material')->nullable()->default(null);
            $table->integer('id_transfer_gudang')->nullable()->default(null);
            $table->integer('id_material');
            $table->integer('quantity_in')->nullable()->default(null);
            $table->integer('quantity_out')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);
            $table->text('data_other')->nullable()->default(null);
            $table->dateTime('registered')->nullable();
            $table->integer('id_stock_opname')->nullable()->default(null);
            $table->integer('id_gudang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_data_stock_material');
    }
}
