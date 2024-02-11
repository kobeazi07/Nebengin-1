<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPenumpang extends Model
{
    use HasFactory;
    protected $table ='trip_penumpangs';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    }
    public function profild(){
        return $this->BelongsTo(User::class, 'drivers_id', 'id');
    }
    public function profilp(){
        return $this->BelongsTo(User::class, 'penumpang_id', 'id');
    }
     public function alasan_pembatalan(){
        return $this->BelongsTo(User::class, 'alasan_pembatalan_id', 'id');
    }
    
    
    public function trip(){
        return $this->belongsTo(Trip::class, 'trips_id', 'id');
    }
    public function tarif(){
        return $this->BelongsTo(Tarif::class, 'tarifs_id', 'id');
}
    public function RelasiRequest(){
        return $this->hasMany(RequestTrip::class, 'trip_penumpangs_id', 'id'); 
    }
}
