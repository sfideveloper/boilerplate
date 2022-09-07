<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmCustomerProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_customer_profession', function (Blueprint $table) {
            $table->id('id_customer_profession');
            $table->integer('id_profession');
            $table->integer('id_customer')->nullable()->default(null);
            $table->integer('id_customer_couple')->nullable()->default(null);
            $table->integer('penghasilan')->nullable()->default(null);
            $table->string('keterangan',100)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_customer_profession');
    }
}
