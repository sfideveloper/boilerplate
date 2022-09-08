<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmPaymentTenorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_payment_tenor', function (Blueprint $table) {
            $table->id('id_payment_tenor');
            $table->integer('id_customer');
            $table->integer('id_unit');
            $table->integer('id_type_transaction_unit');
            $table->integer('id_order_unit')->nullable()->default(null);
            $table->dateTime('date_payment');
            $table->integer('nominal_tenor')->nullable()->default(null);
            $table->integer('nominal_ppn')->nullable()->default(null);
            $table->integer('nominal_pph')->nullable()->default(null);
            $table->integer('nominal_payment');
            $table->tinyInteger('status_pembayaran_ppj')->nullable()->default(0);
            $table->tinyInteger('status_pembayaran_tenor')->nullable()->default(0);
            $table->text('note')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_payment_tenor');
    }
}
