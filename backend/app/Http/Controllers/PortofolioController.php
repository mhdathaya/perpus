<?php

namespace App\Http\Controllers;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function UnggahPortofolio(Request $request)
    {
        $portofolio_url = UploadFile::upload("portofolio", $request->file("portofolio_url"));

        Portofolio::create([
            'dosen_id' => session()->get("dosen_id"),
            'portofolio_url' => $portofolio_url,
            'status' => "Pending",
        ]);

        return redirect("/portofolioku/view")->with("success", "Berhasil Unggah Portofolio");
    }

    public function RejectPortofolio($id)
    {
        Portofolio::where("id", $id)->update([
            "status" => "Reject"
        ]);
        return redirect("/permintaan/view")->with("success_reject", "Berhasil Menolak Portofolio");
    }
    public function AcceptPortofolio($id)
    {
        Portofolio::where("id", $id)->update([
            "status" => "Accept"
        ]);
        return redirect("/permintaan/view")->with("success_accept", "Berhasil Menerima Portofolio");
    }

    public function DeletePortofolio($id)
    {
        $data_portofolio = Portofolio::where("id", $id)->first();
        DeleteFile::delete($data_portofolio->portofolio_url);
        $data_portofolio->delete();
        return redirect("/portofolioku/view")->with("success_delete", "Berhasil Menghapus Portofolio");
    }
}
