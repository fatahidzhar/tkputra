<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk')->unique()->nullable();
            $table->string('nisn')->nullable();
            $table->string('uuid_m')->unique();
            $table->string('nama_panggilan')->nullable();
            $table->string('gender')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('nik')->unique();
            $table->string('no_kk')->unique();
            $table->string('register_akta_lahir')->nullable();
            $table->string('berkebutuhan_khusus')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tahun_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->longText('domisili')->nullable();
            $table->string('nama_dusun')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('kodepos')->nullable();
            $table->longText('tempat_tinggal')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('j_saudara_k')->nullable();
            $table->string('penyakit')->nullable();
            $table->string('tb')->nullable();
            $table->string('bb')->nullable();
            $table->string('lk')->nullable();
            $table->string('jarak')->nullable();
            $table->string('waktu_tempuh')->nullable();
            $table->string('hobby')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('uu_class')->nullable();
            $table->string('f_parent_name')->nullable();
            $table->string('f_parent_nik')->nullable();
            $table->string('f_parent_tempat_lahir')->nullable();
            $table->date('f_parent_birth')->nullable();
            $table->string('f_parent_edu')->nullable();
            $table->string('f_parent_work')->nullable();
            $table->string('f_parent_penghasilan')->nullable();
            $table->string('f_parent_berkebutuhan')->nullable();
            $table->string('f_parent_address')->nullable();
            $table->string('f_parent_kelurahan')->nullable();
            $table->string('f_parent_kodepos')->nullable();
            $table->string('m_parent_name')->nullable();
            $table->string('m_parent_nik')->nullable();
            $table->string('m_parent_tempat_lahir')->nullable();
            $table->date('m_parent_birth')->nullable();
            $table->string('m_parent_edu')->nullable();
            $table->string('m_parent_work')->nullable();
            $table->string('m_parent_penghasilan')->nullable();
            $table->string('m_parent_berkebutuhan')->nullable();
            $table->string('m_parent_address')->nullable();
            $table->string('m_parent_kelurahan')->nullable();
            $table->string('m_parent_kodepos')->nullable();
            $table->string('telp_rumah')->nullable();
            $table->string('telp_ayah')->nullable();
            $table->string('telp_ibu')->nullable();
            $table->string('image')->nullable();
            $table->string('rombel')->nullable();
            $table->string('status', 2)->default('0');
            $table->string('file_kk')->nullable();
            $table->string('file_akta_lahir')->nullable();
            $table->string('file_ktp1')->nullable();
            $table->string('file_ktp2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
