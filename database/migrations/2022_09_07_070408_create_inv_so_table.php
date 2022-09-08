<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvSoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_so', function (Blueprint $table) {
            $table->bigIncrements('id_so');
            $table->integer('id_client');
            $table->integer('id_gudang');
            $table->string('nomor_so');
            $table->bigInteger('id_pembeli')->nullable()->default('1');
            $table->date('tanggal');
            $table->integer('id_payment_method_transaction');
            $table->integer('biaya_lain');
            $table->string('status');
            $table->smallInteger('jenis_pembayaran')->nullable()->default(1);
            $table->integer('diskon')->nullable()->default(0);
            $table->integer('hari_jatuh_tempo')->nullable()->default(null);
            $table->integer('ppn')->nullable()->default(null);
            $table->integer('total');
            $table->text('catatan')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_so');
    }
}
