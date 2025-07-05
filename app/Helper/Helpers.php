<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;

class Helpers
{
    use FileUpload;

    public static function dbConnectionStatus(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function fileUrl($path = '')
    {
        return $this->filePath($path);
    }
}
