<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi_Kursi extends Model
{
    use HasFactory;
    protected $table ='posisi_kursi';
    protected $guarded =[];

        public function trip(){
            return $this->belongsTo(Trip::class, 'trips_id', 'id');
        }
    


}
