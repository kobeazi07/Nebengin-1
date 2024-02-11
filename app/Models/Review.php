<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table ='reviews';
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
    public function trip_penumpangs(){
        return $this->zbelongsTo(TripPenumpang::class, 'penumpang_trips_id', 'id' );
    }
}
