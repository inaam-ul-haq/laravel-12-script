<?php

namespace App\Helper;

use Illuminate\Support\Str;

class GenerateSlug
{
    public static function generate($name)
    {
        return Str::slug($name);
    }
}
