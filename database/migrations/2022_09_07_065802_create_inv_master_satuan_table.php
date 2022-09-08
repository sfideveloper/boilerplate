<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvMasterSatuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_master_satuan', function (Blueprint $table) {
            $table->bigIncrements('id_satuan');
            $table->integer('id_client');
            $table->string('nama_satuan',150);
            $table->dateTime('registered',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_master_satuan');
    }
}
