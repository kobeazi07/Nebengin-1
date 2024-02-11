<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $table ='rutes';
    protected $guarded =[];

    public function daerahs(){
        return $this->belongsTo(Region::class,'daerah_asal', 'id');
    }
    public function daerahss(){
        return $this->belongsTo(Region::class,'daerah_tujuan', 'id');
    }
}
