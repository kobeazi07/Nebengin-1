<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    protected $table ='tarif';
    protected $guarded =[];
    

    public function rutes(){
        return $this->belongsTo(Rute::class, 'rutes_id', 'id');
    }

    public function kendaraang(){
        return $this->belongsTo(Kendaraan::class, 'kendaraans_id', 'id');
    }
    public function trip(){
        return $this->hasMany(Trip::class, 'trips_id', 'id');
    }
    public function Request(){
        return $this->hasMany(RequestTrip::class, 'tarif_rute_id', 'id');
    }
}
