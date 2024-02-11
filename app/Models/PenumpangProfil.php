<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenumpangProfil extends Model
{
    use HasFactory;
    protected $table ='penumpang_profils';
    protected $guarded =[];

    public function penumpang_profil(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}