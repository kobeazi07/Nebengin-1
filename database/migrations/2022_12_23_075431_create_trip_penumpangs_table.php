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
        Schema::create('trip_penumpangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->bigInteger('trips_id')->unsigned()->nullable();
            $table->bigInteger('profilp_id')->unsigned()->nullable();
            $table->bigInteger('profild_id')->unsigned()->nullable();
            $table->bigInteger('tarifs_id')->unsigned()->nullable();
            $table->text('catatan_lokasi');
            $table->integer('posisi_kursi');
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
        Schema::dropIfExists('trip_penumpangs');
    }
};
