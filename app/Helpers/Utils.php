<?php

namespace App\Helpers;

use App\Services\Admin\SettingService;

class Utils
{

    public static function validateDomain($domain){
        if (str_starts_with($domain,'www')){
            return str_replace('www.','',$domain);
        }
        return $domain;
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


    public static function getIpAddress()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
           return $_SERVER["HTTP_CF_CONNECTING_IP"];
        }

    }


    public static function priceFormat($price, $currencyCode = '₺')
    {
       return  number_format($price, 2, ',', '.') . ' ' . $currencyCode;
    }


}
