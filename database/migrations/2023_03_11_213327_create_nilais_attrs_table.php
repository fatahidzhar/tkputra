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
        Schema::create('nilais_attrs', function (Blueprint $table) {
            $table->id();
            $table->string('uu_attrs');
            $table->string('uu_mapel');
            $table->string('uu_class');
            $table->longText('uu_kd')->nullable();
            $table->longText('kegiatan')->nullable();
            $table->date('tanggal');
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
        Schema::dropIfExists('nilais_attrs');
    }
};
