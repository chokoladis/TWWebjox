<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Upload
{
    public function UploadFile(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $FileName = !is_null($filename) ? $filename : Str::random(10);
        $path = $file->storeAs(
            $folder,
            $FileName . "." . $file->getClientOriginalExtension(),
            $disk
        );
        return ['name' => $FileName, 'path' => $path];
    }

    public function deleteFile($path, $disk = 'public')
    {
        Storage::disk($disk)->delete($path);
    }
}