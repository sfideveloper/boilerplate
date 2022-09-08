<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_user', function (Blueprint $table) {
            $table->id();
            $table->integer('id_client');
            $table->integer('id_regency');
            $table->integer('id_district');
            $table->string('nama_user');
            $table->string('email_user');
            $table->text('password');
            $table->string('hp_user');
            $table->string('alamat_user');
            $table->char('jk')->nullable()->default(null);
            $table->string('tempat_lahir')->nullable()->default(null);
            $table->date('tanggal_lahir')->nullable()->default(null);
            $table->tinyInteger('status')->default(1);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_user');
    }
}
