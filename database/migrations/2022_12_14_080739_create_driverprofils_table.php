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
        Schema::create('driverprofils', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->bigInteger('kendaraans_id')->unsigned()->nullable();
            $table->string('foto_profil');
            $table->string('ktp');
            $table->string('sim');
            $table->string('stnk');
            $table->string('fotokendaraan1');
            $table->string('fotokendaraan2');
            $table->string('fotokendaraan3');
            $table->string('fotokendaraan4');
            $table->string('fotokendaraan5');
            
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
        Schema::dropIfExists('driverprofils');
    }
};
