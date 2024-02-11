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
        Schema::create('request_pickup', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trip_penumpang_id');
        $table->bigInteger('trips_id');
            $table->bigInteger('tarif_rute_id');
            $table->longText('lokasi_penjemputan');
            $table->longText('barang_bawaan');
            $table->string('fotob');
            $table->string('status_request');
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
        Schema::dropIfExists('request_pickup');
    }
};
