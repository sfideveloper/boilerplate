<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvWriteOffPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_write_off_po', function (Blueprint $table) {
            $table->bigIncrements('id_write_off_po');
            $table->integer('id_po');
            $table->date('tanggal_dibuat');
            $table->string('alasan',255);
            $table->integer('biaya_lain');
            $table->integer('diskon');
            $table->tinyInteger('status_approve',4)->nullable()->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_write_off_po');
    }
}
