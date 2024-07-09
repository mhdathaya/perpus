<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PeminjamController extends Controller
{
    public function RegisterPeminjam(Request $request)
    {
        $data_user =  User::create([
            'role' => "peminjam",
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        Peminjam::create([
            "user_id" => $data_user->id,
            'name' => $request->name,
            "alamat" => null,
            "nomor_telepon" => $request->no_telepon,
        ]);

        return  redirect("/login-view")->with("success", "Berhasil Mendaftar");
    }
}
