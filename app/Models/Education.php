<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Education extends Model
{
    use HasFactory;
    public $table = "educations"; 

    protected $fillable = [
        'angkatan',
        'fakultas',
        'jurusan',
        'kode_jurusan',
        'NIM',
        'angkatan2',
        'fakultas2',
        'jurusan2',
        'kode_jurusan2',
        'NIM2',
        'angkatan2',
        'fakultas2',
        'jurusan2',
        'kode_jurusan2',
        'NIM2',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
