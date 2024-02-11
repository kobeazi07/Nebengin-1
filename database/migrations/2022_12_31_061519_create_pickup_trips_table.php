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
        Schema::create('pickup_trips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->bigInteger('jenis_motor_id')->unsigned()->nullable();
            $table->bigInteger('pickup_tarifs_id')->unsigned()->nullable();
            $table->bigInteger('profilp_id')->unsigned()->nullable();
            $table->bigInteger('profild_id')->unsigned()->nullable();
            $table->date('tanggal');
            $table->string('waktu');
            $table->text('note');
            $table->integer('kapasitas');
            $table->integer('status_trip')->nullable();
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
        Schema::dropIfExists('pickup_trips');
    }
};
