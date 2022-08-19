<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cabang extends Model
{
    use HasFactory;
    public $table = "cabangs";
    protected $fillable = [
        'judul', 
        'ketua',
        'alamat',
        'deskripsi', 
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function usercabang()
    {
        return $this->hasMany(UserCabang::class);
    }


}
