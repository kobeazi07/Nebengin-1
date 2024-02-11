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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->bigInteger('kendaraans_id')->unsigned()->nullable();
            $table->bigInteger('profild_id')->unsigned()->nullable();
            $table->date('tanggal');
            $table->string('waktu');
            $table->integer('kapasitas');
            $table->integer('status_trip')->nullable();
            $table->text('catatan_lokasi');
            $table->text('catatan_biasa'); 
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
        Schema::dropIfExists('trips');
    }
};
