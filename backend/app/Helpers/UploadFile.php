<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class UploadFile
{
    public static function upload($storageLocation, $file)
    {

        $file_url = time() . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload

        // upload file
        $file->move($storageLocation, $file_url);

        $file_url = url("/" . $storageLocation . "/" . $file_url);

        return $file_url;
    }
}
