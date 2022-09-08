<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvSoDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_so_detail', function (Blueprint $table) {
            $table->bigIncrements('id_so_detail');
            $table->integer('id_so');
            $table->integer('id_material');
            $table->integer('quantity');
            $table->integer('harga_satuan');
            $table->integer('total')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_so_detail');
    }
}
