<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'book_category_id',
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'lokasi',
        'jumlah_stok',
        'gambar'

    ];
    public function book_category()
    {
        return $this->belongsTo(BookCategory::class);
    }
    use HasFactory;
}
