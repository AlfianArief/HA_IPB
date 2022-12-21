<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormRequest extends Model
{
    use HasFactory;
    public $table = "formrequests";
    protected $fillable = [
        'pindah_cabang',
        'id_users',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
