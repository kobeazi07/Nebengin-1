<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupTripPenumpang extends Model
{
    use HasFactory;
    protected $table ='pickup_trip_penumpangs';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    }
    public function profild(){
        return $this->BelongsTo(User::class, 'profild_id', 'id');
    }
    public function profilp(){
        return $this->BelongsTo(User::class, 'profilp_id', 'id');
    }
    public function pickuptrip(){
        return $this->belongsTo(Pickuptrip::class, 'pickup_trips_id', 'id');
    }
    public function pickuptarif(){
        return $this->BelongsTo(TarifPickup::class, 'pickup_tarifs_id', 'id');
    }
    public function jenismotor(){
        return $this->BelongsTo(JenisMotor::class, 'jenis_motor_id', 'id');
    }
     public function RelasiRequest(){
        return $this->hasMany(RequestPickup::class, 'pickup_trip_penumpangs_id', 'id'); 
    }
}
