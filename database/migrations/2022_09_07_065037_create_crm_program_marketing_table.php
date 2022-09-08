<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmProgramMarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_program_marketing', function (Blueprint $table) {
            $table->bigIncrements('id_program_marketing');
            $table->integer('id_client');
            $table->integer('id_type_diskon');
            $table->string('nama_program_marketing',50);
            $table->date('date_start');
            $table->date('date_end');
            $table->text('keterangan')->nullable()->default(null);
            $table->integer('target_penjualan')->nullable()->default(null)->comment('kuota promo');
            $table->integer('besaran_diskon')->nullable()->default(null);
            $table->text('upload_banner')->nullable()->default(null);
            $table->string('deskripsi',250)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_program_marketing');
    }
}
