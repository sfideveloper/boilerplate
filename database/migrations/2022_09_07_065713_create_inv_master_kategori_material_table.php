<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMasterKategoriMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_master_kategori_material', function (Blueprint $table) {
            $table->bigIncrements('id_kategori_material');
            $table->integer('id_client')->nullable()->default(null);
            $table->string('nama_kategori');
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
        Schema::dropIfExists('inv_master_kategori_material');
    }
}
