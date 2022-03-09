<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function isAdmin($isAdmin = 0) : string
    {
        return $isAdmin == 0 ?
            '<span class="btn btn-success btn-xs">Khách</span>' :
            '<span class="btn btn-danger btn-xs">Admin</span>';
    }

}
