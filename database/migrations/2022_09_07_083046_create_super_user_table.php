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
            $table->integer('role_id', 11)->nullable()->default(null);
            $table->integer('id_client', 11);
            $table->integer('id_regency', 11);
            $table->integer('id_district', 11);
            $table->string('nama_user', 20);
            $table->string('email_user', 30);
            $table->text('password');
            $table->string('hp_user', 16);
            $table->string('alamat_user', 191);
            $table->char('jk',1)->nullable()->default(null);
            $table->string('tempat_lahir', 200)->nullable()->default(null);
            $table->date('tanggal_lahir')->nullable()->default(null);
            $table->tinyInteger('status', 4)->default(1);
            $table->timestamp('email_verified_at')->nullable()->default(null);
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
