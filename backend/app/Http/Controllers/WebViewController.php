<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Dosen;
use App\Models\Peminjam;
use App\Models\Pinjaman;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class WebViewController extends Controller
{
    public function LoginView()
    {

        return view("auth.login");
    }
    public function RegisterView()
    {

        return view("auth.register");
    }
    public function HomeView()
    {
        $data_book = Book::count();
        return view("home.homeView", compact("data_book"));
    }
    public function CategoryView()
    {
        $data_category = BookCategory::get();
        return view("category.index", compact("data_category"));
    }
    public function CreateCategoryView()
    {

        return view("category.create");
    }
    public function UpdateCategoryView($id)
    {
        $data_category = BookCategory::where("id", $id)->get();
        return view("category.update", compact("data_category"));
    }

    public function bookIndexView()
    {
        $data_book = Book::with("book_category")->get();
        return view("book.index", compact("data_book"));
    }
    public function createBookIndexView()
    {
        $book_categories = BookCategory::get();
        return view("book.create", compact("book_categories"));
    }
    public function updateBookIndexView($id)
    {
        $book_categories = BookCategory::get();
        $data_book = Book::where("id", $id)->with("book_category")->get();
        return view("book.update", compact("book_categories", "data_book"));
    }
    public function pinjamIndexView()
    {

        $data_peminjam = Peminjam::where("user_id", session()->get("user_id"))->first();
        $data_book = Book::get();
        return view("pinjam_buku.index", compact("data_book", "data_peminjam"));
    }
    public function historyView()
    {
        $data_peminjam = Peminjam::where("user_id", session()->get("user_id"))->first();
        $data_pinjaman = null;
        if (session()->get("role") == "peminjam") {
            $data_pinjaman = Pinjaman::where("peminjam_id", $data_peminjam->id)->with("peminjam.user")->with("book")->get();
        } else {
            $data_pinjaman = Pinjaman::with("peminjam.user")->with("book")->get();
        }
        return view("history.index", compact("data_pinjaman"));
    }
}
