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
        Schema::create('pickup_trip_penumpangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->bigInteger('penumpang_trips_id')->unsigned()->nullable();
            $table->bigInteger('profilp_id')->unsigned()->nullable();
            $table->bigInteger('profild_id')->unsigned()->nullable();
            $table->bigInteger('jenis_motor_id')->unsigned()->nullable();
            $table->bigInteger('tarif_pickups_id')->unsigned()->nullable();
            $table->string('foto');
            $table->text('note_lokasi_jemput');
            $table->text('catatan_antar');
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
        Schema::dropIfExists('pickup_trip_penumpangs');
    }
};
