<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalSaldo extends Model
{
    use HasFactory;
    protected $table ='total_saldos';
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'users_id', 'id');
    }

    public function topup_saldo(){
        return $this->belongsTo(TopupSaldo::class, 'topup_saldo_id', 'id' );
    } 
}
