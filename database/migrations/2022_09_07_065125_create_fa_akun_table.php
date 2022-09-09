<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaAkunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fa_akun', function (Blueprint $table) {
            $table->bigIncrements('id_akun');
            $table->string('nama_akun',100);
            $table->string('type',50)->comment('kas, bank');
            $table->string('no_rekening',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fa_akun');
    }
}
