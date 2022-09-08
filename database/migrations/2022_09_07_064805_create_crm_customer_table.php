<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_customer', function (Blueprint $table) {
            $table->id('id_customer');            
            $table->bigInteger('id_client')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_pameran')->unsigned();
            $table->bigInteger('id_information_media')->unsigned();
            $table->string('nama_customer');
            $table->string('email_customer')->nullable();
            $table->text('hp_customer');
            $table->string('tempat_lahir')->nullable()->default(null);
            $table->date('tanggal_lahir');
            $table->text('alamat_customer');
            $table->char('id_village');
            $table->char('id_district');
            $table->char('id_regency');
            $table->bigInteger('postal_code')->unsigned();
            $table->bigInteger('id_religion')->unsigned();
            $table->bigInteger('status_nikah')->unsigned();
            $table->string('no_ktp');
            $table->text('img_ktp');
            $table->text('img_close_up');
            $table->text('alamat_domisili');
            $table->char('id_village_domisili');
            $table->char('id_district_domisili');
            $table->char('id_regency_domisili');
            $table->bigInteger('postal_code_domisili')->unsigned();
            $table->text('alamat_korespondensi');
            $table->char('id_village_korespondensi');
            $table->char('id_district_korespondesi');
            $table->char('id_regency_korespondensi');
            $table->bigInteger('postal_code_korespondensi')->unsigned();
            $table->string('nama_instansi');
            $table->string('jabatan');
            $table->string('hp_instansi');
            $table->string('fax_instansi');
            $table->string('NPPKP_instansi');
            $table->string('kontak_person');
            $table->text('alamat_instansi');
            $table->string('jenis_usaha');
            $table->string('sumber_dana');
            $table->bigInteger('penghasilan_tambahan')->unsigned();
            $table->bigInteger('total_pendapatan')->unsigned();
            $table->bigInteger('biaya_pengeluaran')->unsigned();
            $table->text('credit_data');
            $table->bigInteger('total_credit')->unsigned();
            $table->text('nominal');
            $table->text('catatan');
            $table->text('profesi_lain');
            $table->date('registered');
            $table->bigInteger('sisa_penghasilan')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_customer');
    }
}
