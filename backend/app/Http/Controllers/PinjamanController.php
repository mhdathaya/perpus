<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function create(Request $request)
    {
        $data_book = Book::where("id", $request->book_id)->first();
        Pinjaman::create([
            'peminjam_id' => $request->peminjam_id,
            'book_id' => $request->book_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        $data_book->update([
            "jumlah_stok" => $data_book->jumlah_stok - 1
        ]);


        return redirect("/history/view");
    }
}
