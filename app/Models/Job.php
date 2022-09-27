<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public $table = "jobs"; 

    protected $fillable = [
        'pekerjaan',
        'nama_p',
        'alamat_p',
        'jabatan',
        'produk',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
