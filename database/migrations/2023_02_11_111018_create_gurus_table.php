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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_g')->unique();
            $table->string('nip')->unique()->nullable();
            $table->string('nuptk')->unique()->nullable();
            $table->longText('address')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('agama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tahun_lahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('telp')->nullable();
            $table->string('jabatan')->nullable();
            $table->date('tmt_kerja')->nullable();
            $table->string('pend_terakhir')->nullable();
            $table->string('ket')->nullable();
            $table->string('tahun')->nullable();
            $table->string('uu_class')->nullable();
            $table->string('status', 2)->default('0');
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
        Schema::dropIfExists('gurus');
    }
};
