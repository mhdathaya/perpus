<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookApiController extends Controller
{
    public function getAll()
    {
        $books = Book::all();

        return response()->json([
            "message" => "success get all",
            "data" => $books
        ]);
    }

    public function getById($id)
    {
        $book = Book::find($id);

        return response()->json([
            "message" => "success get by id",
            "data" => $book
        ]);
    }

    public function create(Request $request)
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

        $bookData = $request->only(['book_category_id', 'judul', 'pengarang', 'penerbit', 'lokasi', 'jumlah_stok']);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/images');
            $bookData['gambar'] = $path;
        }

        $book = Book::create($bookData);

        return response()->json([
            "message" => "success create",
            "data" => $book
        ]);
    }

    public function update($id, Request $request)
    {
        $book = Book::find($id);

        $request->validate([
            'book_category_id' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'lokasi' => 'required',
            'jumlah_stok' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image
        ]);

        $bookData = $request->only(['book_category_id', 'judul', 'pengarang', 'penerbit', 'lokasi', 'jumlah_stok']);

        if ($request->hasFile('gambar')) {
            // Delete the old image
            if ($book->gambar) {
                Storage::delete($book->gambar);
            }

            // Store the new image
            $path = $request->file('gambar')->store('public/images');
            $bookData['gambar'] = $path;
        }

        $book->update($bookData);

        return response()->json([
            "message" => "success update",
            "data" => $book
        ]);
    }

    public function delete($id)
    {
        $book = Book::find($id);

        if ($book->gambar) {
            Storage::delete($book->gambar);
        }

        $book->delete();

        return response()->json([
            "message" => "success delete"
        ]);
    }
}

