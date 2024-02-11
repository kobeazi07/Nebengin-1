<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifPickup extends Model
{
    use HasFactory;
    protected $table ='pickup_tarifs';
    protected $guarded =[];

    public function rutes(){
        return $this->belongsTo(Rute::class, 'rutes_id', 'id');
    }

    public function trip(){
        return $this->hasMany(Trip::class, 'trips_id', 'id');
    }
    

}
