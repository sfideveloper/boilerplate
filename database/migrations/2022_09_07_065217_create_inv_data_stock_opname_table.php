<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvDataStockOpnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_data_stock_opname', function (Blueprint $table) {
            $table->bigIncrements('id_detail_stock_opname');
            $table->integer('id_material');
            $table->tinyInteger('status_material',4)->comment('0 : stock opname, 1 : temuan baru');
            $table->integer('quantity');
            $table->integer('id_stock_opname');
            $table->timestamp('updated');
            $table->dateTime('registered')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_data_stock_opname');
    }
}
