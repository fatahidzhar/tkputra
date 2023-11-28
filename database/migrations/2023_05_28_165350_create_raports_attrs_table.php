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
        Schema::create('raports_attrs', function (Blueprint $table) {
            $table->id();
            $table->string('uu_raport');
            $table->string('uuid_g');
            $table->string('uuid_m');
            $table->string('uu_mapel');
            $table->boolean('nilai')->nullable();
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
        Schema::dropIfExists('raports_attrs');
    }
};
