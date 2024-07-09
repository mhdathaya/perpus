<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function Login(Request $request)
    {
        $data = User::where("email", $request->email)->first();
        if ($data == null) {
            return  redirect("/login-view")->with("failed", "Email atau Password Salah");
        }

        if (Hash::check($request->password, $data->password)) {
            User::where("id", $data->id)->update([
                "remember_token" => Str::random(60)
            ]);
            $newData = User::where("id", $data->id)->first();
            $request->session()->put('role', $newData->role);
            $request->session()->put('email', $newData->email);
            $request->session()->put('user_id', $newData->id);

            $request->session()->put('remember_token', $newData->remember_token);


            return redirect("/home-view")->with("success", "Berhasil Login");;
        } else {
            return  redirect("/")->with("success", "Gagal Login");
        }
    }
}
