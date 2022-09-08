<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmCustomerCoupleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_customer_couple', function (Blueprint $table) {
            $table->id('id_customer_couple');
            $table->integer('id_customer');
            $table->integer('id_pameran');
            $table->integer('id_information_media');
            $table->string('nama_customer');
            $table->string('email_customer')->nullable();
            $table->text('hp_customer');
            $table->string('tempat_lahir')->nullable()->default(null);
            $table->date('tanggal_lahir');
            $table->text('alamat_customer');
            $table->char('id_village');
            $table->char('id_district');
            $table->char('id_regency');
            $table->integer('postal_code');
            $table->integer('id_religion');
            $table->integer('status_nikah');
            $table->string('no_ktp');
            $table->text('img_ktp');
            $table->text('img_close_up');
            $table->text('alamat_domisili');
            $table->char('id_village_domisili');
            $table->char('id_district_domisili');
            $table->char('id_regency_domisili');
            $table->integer('postal_code_domisili');
            $table->text('alamat_korespondensi');
            $table->char('id_village_korespondensi');
            $table->char('id_district_korespondesi');
            $table->char('id_regency_korespondensi');
            $table->integer('postal_code_korespondensi');
            $table->string('nama_instansi');
            $table->string('jabatan');
            $table->string('hp_instansi');
            $table->string('fax_instansi');
            $table->string('NPPKP_instansi');
            $table->string('kontak_person');
            $table->text('alamat_instansi');
            $table->string('jenis_usaha');
            $table->string('sumber_dana');
            $table->integer('penghasilan_tambahan');
            $table->integer('total_pendapatan');
            $table->integer('biaya_pengeluaran');
            $table->text('credit_data');
            $table->integer('total_credit');
            $table->text('nominal');
            $table->text('catatan');
            $table->text('profesi_lain');
            $table->date('registered');
            $table->integer('sisa_penghasilan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_customer_couple');
    }
}
