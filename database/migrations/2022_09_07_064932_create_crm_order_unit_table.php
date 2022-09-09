<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmOrderUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_order_unit', function (Blueprint $table) {
            $table->bigIncrements('id_order_unit');
            $table->integer('id_customer')->nullable()->default(null);
            $table->integer('id_unit')->nullable()->default(null);
            $table->integer('id_payment_method_unit')->nullable()->default(null);
            $table->integer('id_user')->comment('jika perwakilan ada sales');
            $table->integer('id_process_order_unit')->nullable()->default(null);
            $table->integer('id_bank')->nullable()->default(null);
            $table->string('kode_ppjb')->nullable()->default(null);
            $table->string('kode_spu')->nullable()->default(null);
            $table->string('kode_ajb')->nullable()->default(null);
            $table->string('kode_bast')->nullable()->default(null);
            $table->string('kode_spk_ajb')->nullable()->default(null);
            $table->string('kode_pesan_lama')->nullable()->default(null)->comment('refrensi kode booking / kontrak lama, jika dari over kontrak');
            $table->string('nama_perwakilan')->nullable()->default(null);
            $table->tinyInteger('status_BAST')->nullable()->default(null)->comment('0 : belum, 1 : sudah');
            $table->integer('status_AJB')->nullable()->default(null)->comment('1 : pengajuan, 2 : disteujui');
            $table->integer('harga_diskon')->nullable()->default(null)->comment('optional');
            $table->integer('harga_potongan')->nullable()->default(null)->comment('optional');
            $table->integer('harga_ppn')->nullable()->default(null);
            $table->integer('harga_pph')->nullable()->default(null);
            $table->integer('harga_spec_up')->nullable()->default(null);
            $table->integer('harga_final')->nullable()->default(null);
            $table->text('hadiah_data')->nullable()->default(null)->comment('json, detail item hadiah');
            $table->integer('harga_total_hadiah')->nullable()->default(null)->comment('digunakan jika butuh get total semua row');
            $table->tinyInteger('status_batal')->nullable()->default(null)->comment('0 : tidak, 1 : waiting, 2: approve');
            $table->dateTime('date_batal')->nullable()->default(null);
            $table->text('note_batal')->nullable()->default(null);
            $table->text('dokumen_data')->nullable()->default(null)->comment('json, kelengkapan dokumen');
            $table->tinyInteger('status_over_kontrak')->nullable()->default(null)->comment('0 : tidak, 1 : waiting, 2: approve');
            $table->date('tanggal_AJB')->nullable()->default(null);
            $table->date('tanggal_AJB')->nullable()->default(null);
            $table->tinyInteger('status_akad_kredit')->nullable()->default(null);
            $table->integer('nominal_kredit')->nullable()->default(null);
            $table->string('nomor_sp3k')->nullable()->default(null);
            $table->date('tanggal_sp3k')->nullable()->default(null);
            $table->text('data_speckup')->nullable()->default(null)->comment('json {deskripsi, perkiraan}');
            $table->tinyInteger('pengenaan_ppn')->nullable()->default(null)->comment('{0: tidak, 1:10%, 2:nominal}');
            $table->integer('nominal_ppn')->nullable()->default(null);
            $table->integer('perkiraan_ppn')->nullable()->default(null);
            $table->date('tanggal_booking')->nullable()->default(null);
            $table->date('tanggal_kontrak')->nullable()->default(null);
            $table->integer('id_program_marketing')->nullable()->default(null);
            $table->string('diterima_melalui')->nullable()->default(null);
            $table->integer('id_payment_method_transaction')->nullable()->default(null);
            $table->integer('id_bank_kpr')->nullable()->default(null);
            $table->string('no_rekening')->nullable()->default(null);
            $table->date('tanggal_spk_AJB')->nullable()->default(null);
            $table->dateTime('tanggal_persetujuan_ajb')->nullable()->default(null);
            $table->string('nama_notaris')->nullable()->default(null);
            $table->integer('masa_garansi')->nullable()->default(null);
            $table->tinyInteger('status')->default(1)->comment('1 = aktif, 0 = non aktif');
            $table->integer('rincian')->nullable()->default(null);
            $table->integer('booking_fee_order')->nullable()->default(null);
            $table->dateTime('registered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_order_unit');
    }
}
