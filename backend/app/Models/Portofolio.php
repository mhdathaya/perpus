<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{

    protected $fillable = [
        'dosen_id',
        'portofolio_url',
        'status',

    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    use HasFactory;
}
