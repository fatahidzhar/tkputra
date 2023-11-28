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
        Schema::create('aspek_k_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('uu_kd')->unique();
            $table->string('uu_mapel');
            $table->string('no_kd', 5);
            $table->string('kd');
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
        Schema::dropIfExists('aspek_k_d_s');
    }
};
