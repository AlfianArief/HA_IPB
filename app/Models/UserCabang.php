<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;    

class UserCabang extends Model
{
    use HasFactory, Notifiable;
    public $table = "usercabangs";
    protected $fillable = [
        'id_cabang',
        'id_users',
        'status',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
