<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUpload
{
    private $_disk = 'public';

    public function uploadFile($file, $filePath)
    {
        $name = Str::random(4) . '_' . $file->getClientOriginalName();
        $path = $filePath . '' . $name;
        Storage::disk($this->_disk)->put($path, File::get($file));

        return [
            'name' => $name,
            'path' => $path,
        ];
    }

    public function deleteFile($filePath)
    {
        return Storage::disk($this->_disk)->delete($filePath);
    }

    public function filePath($filePath)
    {
        return Storage::disk($this->_disk)->url($filePath);
    }
}
