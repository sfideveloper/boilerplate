<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmLeadsFuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_leads_fu', function (Blueprint $table) {
            $table->bigIncrements('id_leads_fu');
            $table->integer('id_customer');
            $table->date("time_leads")->nullable()->default(null);
            $table->text('note')->nullable()->default(null);
            $table->text('note_spv')->nullable()->default(null);
            $table->text('note_manager')->nullable()->default(null);
            $table->text('note_kendala')->nullable()->default(null);
            $table->string('rencana_fu',100)->nullable()->default(null);
            $table->date('registered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_leads_fu');
    }
}
