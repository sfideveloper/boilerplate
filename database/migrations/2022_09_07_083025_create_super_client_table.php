<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_client', function (Blueprint $table) {
            $table->bigIncrements('id_client');
            $table->integer('id_package_subscribe');
            $table->integer('id_province')->nullable()->default(null);
            $table->integer('id_regency')->nullable()->default(null);
            $table->integer('id_district')->nullable()->default(null);
            $table->integer('id_village')->nullable()->default(null);
            $table->string('nama_client');
            $table->string('alias_client');
            $table->string('email_client');
            $table->string('hp_client');
            $table->string('alamat_client');
            $table->string('postal_code')->nullable()->default(null);
            $table->text('web_client')->nullable()->default(null);
            $table->text('nama_dalam_perjanjian')->nullable()->default(null);
            $table->string('jabatan',100)->nullable()->default(null);
            $table->text('logo_url')->nullable()->default(null);
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
        Schema::dropIfExists('super_client');
    }
}
