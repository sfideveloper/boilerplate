<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmTitipanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_titipan', function (Blueprint $table) {
            $table->id('id_titipan_crm');
            $table->integer('id_titipan');            
            $table->string('nama_titipan')->nullable()->default(null);
            $table->integer('id_unit');
            $table->integer('nominal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_titipan');
    }
}
