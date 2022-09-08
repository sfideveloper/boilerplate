<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvPoDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_po_detail', function (Blueprint $table) {
            $table->bigIncrements('id_po_detail');
            $table->integer('id_po');
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
        Schema::dropIfExists('inv_po_detail');
    }
}
