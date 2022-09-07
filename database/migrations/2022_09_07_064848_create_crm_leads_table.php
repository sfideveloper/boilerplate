<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_leads', function (Blueprint $table) {
            $table->id('id_leads');            
            $table->integer('id_customer');
            $table->integer('id_program_marketing')->nullable()->default(null);
            $table->integer('id_payment_method_unit')->nullable()->default(null);
            $table->integer('id_bank')->nullable()->default(null);
            $table->integer('id_type_leads');
            $table->integer('id_information_media')->nullable()->default(null);
            $table->date('date_NUP')->nullable()->default(null);
            $table->integer('nominal_NUP')->nullable()->default(null);
            $table->date('date_SPU')->nullable()->default(null);
            $table->integer('nominal_SPU')->nullable()->default(null);
            $table->integer('budget_bel_unit')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_leads');
    }
}
