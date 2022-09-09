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
            $table->id('id_customer', 11)->nullable()->default();
            $table->integer('id_client', 11);
            $table->integer('id_user', 11);
            $table->integer('id_pameran', 11);
            $table->integer('id_information_media', 11);
            $table->string('nama_customer', 30);
            $table->string('email_customer',35)->nullable();
            $table->text('hp_customer');
            $table->string('tempat_lahir', 50)->nullable()->default(null);
            $table->date('tanggal_lahir');
            $table->text('alamat_customer');
            $table->char('id_village', 10);
            $table->char('id_district', 7);
            $table->char('id_regency', 4);
            $table->integer('postal_code', 11);
            $table->integer('id_religion');
            $table->integer('status_nikah');
            $table->string('no_ktp', 50);
            $table->text('img_ktp');
            $table->text('img_close_up');
            $table->text('alamat_domisili');
            $table->char('id_village_domisili',11);
            $table->char('id_district_domisili',11);
            $table->char('id_regency_domisili',11);
            $table->integer('postal_code_domisili');
            $table->text('alamat_korespondensi');
            $table->char('id_village_korespondensi',11);
            $table->char('id_district_korespondesi',11);
            $table->char('id_regency_korespondensi',11);
            $table->integer('postal_code_korespondensi');
            $table->string('nama_instansi',100);
            $table->string('jabatan',50);
            $table->string('hp_instansi',16);
            $table->string('fax_instansi',30);
            $table->string('NPPKP_instansi',50);
            $table->string('kontak_person',30);
            $table->text('alamat_instansi');
            $table->string('jenis_usaha',30);
            $table->string('sumber_dana',30);
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
        Schema::dropIfExists('crm_customer');
    }
}
