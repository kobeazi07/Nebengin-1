<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTrip extends Model
{
    use HasFactory;
    protected $table ='requests';
    protected $guarded =[];

    public function RelasiRequets(){
        return $this->belongsTo(Tarif::class, 'tarif_rute_id','id');
    }
    public function RelasiTripP(){
        return $this->belongsTo(TripPenumpang::class, 'trip_penumpangs_id','id');
    }   
}
