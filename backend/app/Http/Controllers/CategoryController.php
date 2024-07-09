<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Create(Request $request)
    {
        BookCategory::create([
            "name" => $request->name,
        ]);
        return redirect("/category/view");
    }
    public function Update(Request $request)
    {
        BookCategory::where("id", $request->id)->update([
            "name" => $request->name,
        ]);
        return redirect("/category/view");
    }
    public function Delete($id)
    {
        BookCategory::where("id", $id)->delete();
        return redirect("/category/view");
    }
}
