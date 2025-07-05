<?php

use App\Helper\Helpers;

if (!function_exists('fileUrl')) {
    function fileUrl($path = 'users/avatar.png')
    {
        $helper = new Helpers();
        return $helper->fileUrl($path);
    }
}
