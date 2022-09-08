<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMasterAlatBantuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_master_alat_bantu', function (Blueprint $table) {
            $table->bigIncrements('id_alat_bantu');
            $table->integer('id_client');
            $table->string('nama_alat_bantu',255);
            $table->integer('stok_awal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_master_alat_bantu');
    }
}
