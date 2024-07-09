<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthAdminController extends Controller
{



    public function RegisterAdmin(Request $request)
    {
        User::create([
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),

        ]);

        return  redirect("/login-view")->with("success", "Berhasil Mendaftar");
    }

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
            if ($newData->role == "admin") {

                return redirect("/home-view");
            } elseif ($newData->role == "dosen") {
                $data_dosen = Dosen::where("user_id", $newData->id)->first();
                $request->session()->put('dosen_id', $data_dosen->id);
                return redirect("/home-view");
            }
        } else {
            return  redirect("/")->with("success", "Berhasil Mendaftar");
        }
    }


    public function DeleteDosen($id)
    {
        User::where("id", $id)->delete();

        return redirect("/akun/view")->with("success", "Berhasil Menghapus Data");
    }
    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect("/login-view");
    }
}
