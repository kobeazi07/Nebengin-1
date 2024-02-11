<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $table ='trips';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    } 
    public function profild(){
        return $this->BelongsTo(User::class, 'drivers_id', 'id');
    }
    public function r_alasan(){
        return $this->BelongsTo(AlasanPembatalan::class, 'alasan_pembatalan_id', 'id');
    }
    
    public function kendaraang(){
        return $this->belongsTo(Kendaraan::class, 'kendaraans_id', 'id');
    }
    public function tarif(){
        return $this->BelongsTo(Tarif::class, 'tarifs_id', 'id');
    }
    public function trip_penumpangs(){
        return $this->hasMany(TripPenumpang::class, 'penumpang_trips_id', 'id' );
    }
    public function relasi_request(){
        return $this->hasMany(Request_Trip::class, 'request_id', 'id' );
    }
   
    public function relasi_posisi_kursi(){
        return $this->hasMany(Posisi_Kursi::class, 'posisi_trips_id', 'id' );
    }
    
}
