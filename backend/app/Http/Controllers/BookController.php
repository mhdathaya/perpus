<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function Create(Request $request)
    {
        $request->validate([
            'book_category_id' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'lokasi' => 'required',
            'jumlah_stok' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'public');
        }

        $book_created = Book::create([
            'book_category_id' => $request->book_category_id,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'lokasi' => $request->lokasi,
            'jumlah_stok' => $request->jumlah_stok,
            'gambar' => $imagePath,
        ]);

        return redirect("book/view")->with("success", "Success tambah buku");
    }


    public function Update(Request $request)
    {
        $request->validate([
            'book_category_id' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'lokasi' => 'required',
            'jumlah_stok' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image
        ]);

        $book = Book::findOrFail($request->id);

        if ($request->hasFile('gambar')) {
            // Delete the old image
            if ($book->gambar) {
                Storage::disk('public')->delete($book->gambar);
            }
            $imagePath = $request->file('gambar')->store('images', 'public');
        } else {
            $imagePath = $book->gambar;
        }

        $book->update([
            'book_category_id' => $request->book_category_id,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'lokasi' => $request->lokasi,
            'jumlah_stok' => $request->jumlah_stok,
            'gambar' => $imagePath,
        ]);

        return redirect("book/view")->with("success", "Success update buku");
    }

    public function Delete($id)
    {
        $book = Book::findOrFail($id);

        // Delete the image
        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }

        $book->delete();

        return redirect("book/view")->with("success", "Success hapus buku");
    }
}
