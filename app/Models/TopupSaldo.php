<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupSaldo extends Model
{
    use HasFactory;
    protected $table ='topup_saldos';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    }
    
}
