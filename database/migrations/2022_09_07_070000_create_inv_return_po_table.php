<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvReturnPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_return_po', function (Blueprint $table) {
            $table->bigIncrements('id_return_po');
            $table->integer('id_faktur_po');
            $table->string('nomor_return');
            $table->date('tanggal_dibuat');
            $table->string('alasan');
            $table->tinyInteger('status_diterima_kembali')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_return_po');
    }
}
