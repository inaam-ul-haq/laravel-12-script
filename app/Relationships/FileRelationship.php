<?php

namespace App\Relationships;

use App\Helper\FileUpload;
use App\Models\File;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait FileRelationship
{
    use FileUpload;

    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'file');
    }

    public function fileUrl($type = 'profile'): string
    {
        $file = $this->file()->where('type', $type)->first();

        if ($file != null) {
            return $this->filePath($file->path);
        }

        return '';
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'file');
    }

    public function fileUrls(): array
    {
        $fileUrls = [];

        if ($this->files != null) {
            foreach ($this->files as $file) {
                $fileUrls[] = $this->filePath($file->path);
            }
        }

        return $fileUrls;
    }
}
