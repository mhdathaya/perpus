<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanApiController extends Controller
{
    public function create(Request $request)
    {
        $data_book = Book::where("id", $request->book_id)->first();

        $data_peminjam = Peminjam::where("user_id", auth()->user()->id)->first();
        Pinjaman::create([
            'peminjam_id' => $data_peminjam->id,
            'book_id' => $request->book_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        $data_book->update([
            "jumlah_stok" => $data_book->jumlah_stok - 1
        ]);


        return response()->json([
            "message" => "success melakukan pinjaman",

        ]);
    }

    public function getByUser()
    {
        $data_peminjam = Peminjam::where("user_id", auth()->user()->id)->first();

        $data_pinjaman = Pinjaman::where("peminjam_id", $data_peminjam->id)->with("peminjam")->with("book")->get();
        return response()->json([
            "message" => "success get pinjaman by user",
            "data" => $data_pinjaman
        ]);
    }
}
