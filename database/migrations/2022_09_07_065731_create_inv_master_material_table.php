<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMasterMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_master_material', function (Blueprint $table) {
            $table->bigIncrements('id_material');
            $table->integer('id_client');
            $table->string('kode_material');
            $table->string('nama_material');
            $table->integer('id_satuan');
            $table->integer('margin_harga_jual');
            $table->string('pembulatan_persen');
            $table->integer('id_kategori_material')->nullable()->default(null);
            $table->dateTime('registered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_master_material');
    }
}
