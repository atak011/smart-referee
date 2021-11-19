<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class Notification
{


    public static function raiseNotificationToast($title, $message,$status = 'success')
    {

        Session::flash('notification-toast', ['status' => $status, 'title' => $title, 'message' => $message]);
    }

    public static function raiseInfoToast($title, $message,$status = 'success')
    {
        Session::flash('info-toast', ['status' => $status, 'title' => $title, 'message' => $message]);
    }
}
