<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    public $table = "organizations"; 

    protected $fillable = [
        'organisasi',
        'jabatan',
        'tanggal_masuk',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

