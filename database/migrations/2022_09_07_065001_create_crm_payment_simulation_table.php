<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmPaymentSimulationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_payment_simulation', function (Blueprint $table) {
            $table->bigIncrements('id_payment_simulation');
            $table->integer('id_order_unit')->nullable()->default(null);
            $table->integer('id_customer');
            $table->integer('id_unit')->nullable()->default(null);
            $table->integer('id_type_transaction_unit')->nullable()->default(null);
            $table->dateTime('date_payment')->nullable()->default(null);
            $table->integer('nominal_payment')->nullable()->default(null);
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
        Schema::dropIfExists('crm_payment_simulation');
    }
}
