<?php

namespace App\Helpers;

use App\Services\Admin\SettingService;
use Str;

class Url
{

    public static function generateUrl($name,$id){
        return route('productDetail',Str::slug($name)).'-'.$id;
    }

    public static function parseUrl($slug){
        $array = explode('-',$slug);
        return end($array);
    }
}
