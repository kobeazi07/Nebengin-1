<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverProfil extends Model
{
    use HasFactory;
    protected $table ='driverprofils';
    protected $guarded =[];

  
    public function profild(){
        return $this->BelongsTo(User::class, 'drivers_id', 'id');
    }
    
    public function kendaraang(){
        return $this->belongsTo(Kendaraan::class, 'kendaraans_id', 'id');
    }
}
