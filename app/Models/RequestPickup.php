<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPickup extends Model
{
    use HasFactory;
    protected $table ='request_pickup';
    protected $guarded =[];

    public function RelasiRequest(){
        return $this->belongsTo(Tarif::class, 'tarif_rute_id','id');
    }

    public function RelasiTripP(){
        return $this->belongsTo(PickupTripPenumpang::class, 'pickup_trip_penumpangs_id','id');
    }   
    public function RelasiTrip(){
        return $this->belongsTo(Pickuptrip::class, 'pickup_trip_id','id');
    }   



}
