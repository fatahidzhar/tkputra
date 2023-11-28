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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->string('uu_nilai')->unique();
            $table->string('uu_attrs');
            $table->string('uu_mapel');
            $table->string('uuid_g');
            $table->string('uuid_m');
            $table->boolean('cl')->nullable();
            $table->boolean('hk')->nullable();
            $table->boolean('ca')->nullable();
            $table->date('tanggal');
            $table->string('tahun_ajaran');
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
        Schema::dropIfExists('nilais');
    }
};
