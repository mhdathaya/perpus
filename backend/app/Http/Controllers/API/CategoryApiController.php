<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function getAll()
    {
        $book_category = BookCategory::get();

        return response()->json([
            "message" => "success get all",
            "data" => $book_category
        ]);
    }
    public function getById($id)
    {


        $book_category = BookCategory::where("id", $id)->with("book")->first();

        return response()->json([
            "message" => "success get by id",
            "data" => $book_category
        ]);
    }
    public function create(Request $request)
    {

        $book_category =  BookCategory::create([
            "name" => $request->name,
        ]);

        return response()->json([
            "message" => "success create",
            "data" => $book_category
        ]);
    }
    public function update($id, Request $request)
    {

        $book_category =  BookCategory::where("id", $id)->update([
            "name" => $request->name,
        ]);

        return response()->json([
            "message" => "success update",
            "data" => $book_category
        ]);
    }
    public function delete($id)
    {
        $book_category = BookCategory::where("id", $id)->first();

        $book_category->delete();

        return response()->json([
            "message" => "success delete",

        ]);
    }
}
