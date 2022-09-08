<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmPameranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_pameran', function (Blueprint $table) {
            $table->bigIncrements('id_pameran');
            $table->integer('id_client');
            $table->string('nama_pameran',50);
            $table->date('date_start');
            $table->date('date_end');
            $table->text('alamat')->nullable()->default(null);
            $table->text('deskripsi')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_pameran');
    }
}
