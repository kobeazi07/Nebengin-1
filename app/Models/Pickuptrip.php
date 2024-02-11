<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickuptrip extends Model
{
    use HasFactory;
    protected $table ='pickup_trips';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    } 
    public function profild(){
        return $this->BelongsTo(User::class, 'profild_id', 'id');
    }
    public function r_alasan(){
        return $this->BelongsTo(AlasanPembatalan::class, 'alasan_pembatalan_id', 'id');
    }
    public function pickuptarif(){
        return $this->BelongsTo(TarifPickup::class, 'pickup_tarifs_id', 'id');
    }
    public function jenismotor(){
        return $this->BelongsTo(JenisMotor::class, 'jenis_motor_id', 'id');
    }
    public function pickup_trip_penumpangs(){
        return $this->hasMany(PickupTripPenumpang::class, 'pickup_penumpang_trips_id', 'id' );
    }
}
