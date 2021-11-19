<?php

namespace App\Helpers;

use App\Services\Admin\SettingService;

class Site
{

    public static function isEcommerce(){
        return auth()->user()->activeSite->category == 2;
    }

    public static function getAttributeExistFromConf($conf,$key){

        if (isset($conf[$key])){
            return true;
        }else{
            return false;
        }
    }

    public static function cartesian($input) {
        $result = array(array());

        foreach ($input as $key => $values) {
            $append = array();

            foreach($result as $product) {
                foreach($values as $item) {
                    $product[$key] = $item;
                    $append[] = $product;
                }
            }

            $result = $append;
        }

        return $result;
    }

    public static function siteAuthCheck()
    {
        if (auth()->check()){
            return auth()->user()->site_id == config('global.site')->id;
        }
        return false;
    }

    public static function getUserSiteId()
    {
            return auth()->user()->activeSite->id;
    }

    public static function getUserThemeId()
    {
        return auth()->user()->activeSite->theme_id;
    }
}
