<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmTargetUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_target_unit', function (Blueprint $table) {
            $table->bigIncrements('id_target_unit');
            $table->integer('id_customer');
            $table->integer('id_unit');
            $table->tinyInteger('status_utama',4);
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
        Schema::dropIfExists('crm_target_unit');
    }
}
