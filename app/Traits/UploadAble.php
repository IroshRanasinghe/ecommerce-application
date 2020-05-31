<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait UploadAble
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $fileName
     * @return false|string
     */
    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $fileName = null)
    {
        $name = !is_null($fileName) ? $fileName : Str::random(25);
        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            $disk
        );
    }

    /**
     * delete file one by one
     *
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($path=null,$disk='public'){
        Storage::disk($disk)->delete($path);
    }
}
