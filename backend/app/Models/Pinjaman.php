<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjamans'; // Nama tabel yang sesuai
    protected $fillable = [
        'peminjam_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',

    ];

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    use HasFactory;
}
