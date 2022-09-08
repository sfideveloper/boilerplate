<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_po', function (Blueprint $table) {
            $table->bigIncrements('id_po');
            $table->integer('id_client');
            $table->integer('id_gudang');
            $table->string('nomor_po',15);
            $table->integer('id_vendor');
            $table->date('tanggal');
            $table->integer('id_payment_method_transaction');
            $table->integer('biaya_lain');
            $table->string('status',50);
            $table->smallInteger('jenis_pembayaran',1)->nullable()->default(1)->comment('1: Tunai, 2:Kredit');
            $table->integer('diskon')->nullable()->default(0);
            $table->integer('hari_jatuh_tempo')->nullable()->default(null);
            $table->integer('ppn',1)->nullable()->default(null)->comment('1: iya, 0: tidak');
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
        Schema::dropIfExists('inv_po');
    }
}
