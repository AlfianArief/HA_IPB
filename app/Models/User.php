<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'namalengkap',
        'tempatlahir',
        'tanggallahir',
        'jeniskelamin',
        'golongandarah',
        'agama',
        'alamatktp',
        'alamatdomisili',
        'hobi',
        'nomortelfon',
        'password',
        'picture'
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

    public function getPictureAttribute($value){
        if($value){
            return asset('users/images/'.$value);
        } else {
            return asset('users/images/no-image.png');
        }
    }

    public function usercabang(){
        return $this->hasMany(UserCabang::class);
    }

    public function request(){
        return $this->hasMany(FormRequest::class);
    }

    public function education(){
        return $this->hasOne(Education::class);
    }

    public function job(){
        return $this->hasOne(Job::class);
    }

    public function organization(){
        return $this->hasOne(Organization::class);
    }
}
