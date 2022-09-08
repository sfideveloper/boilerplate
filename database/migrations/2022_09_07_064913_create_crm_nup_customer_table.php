<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmNupCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_nup_customer', function (Blueprint $table) {
            $table->bigIncrements('id_nup_customer');
            $table->integer('id_user');
            $table->integer('id_customer');
            $table->integer('id_unit');
            $table->integer('id_program_marketing')->nullable()->default(null);
            $table->integer('id_process_order_unit');
            $table->string('kode_nup',50)->nullable()->default(null);
            $table->date('registered');
            $table->integer('nominal_NUP');
            $table->string('diterima_melalui',10);
            $table->integer('id_payment_method_transaction');
            $table->integer('id_bank');
            $table->string('no_rekening',50);
            $table->date('tanggal_pembayaran');
            $table->text('note')->nullable()->default(null);
            $table->smallInteger('status_bayar');
            $table->integer('status_batal');
            $table->date('date_batal')->nullable()->default(null);
            $table->text('note_batal')->nullable()->default(null);           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_nup_customer');
    }
}
