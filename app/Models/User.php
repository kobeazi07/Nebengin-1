<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'role',
        'identitas',
        'status',
        'gambarprofil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profildriver(){
        return $this->hasOne(DriverProfil::class, 'drivers_id', 'id');
    }

     public function profilpenumpang()
    {
         return $this->hasMany(PenumpangProfil::class, 'penumpangs_id','id');
    }


    public function trips()
    {
        return $this->hasMany(Trip::class, 'trips_id')->orderBy('id', 'DESC');
    }

    public function trip_penumpangs()
    {
        return $this->hasMany(TripPenumpang::class, 'penumpang_trips_id')->orderBy('id', 'DESC');
    }
    public function review()
    {
        return $this->hasMany(Review::class, 'review_id')->orderBy('id', 'DESC');
    }
    public function totalsaldo(){
        return $this->hasOne(TotalSaldo::class, 'total_saldos_id', 'id' );
    } 
    public function topupsaldo(){
        return $this->hasOne(TopupSaldo::class, 'users_id', 'id') ;
    } 

}

