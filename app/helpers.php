<?php namespace App;

use Illuminate\Support\Facades\Request;

class MainHelper
{
    /*
        Sets active class on navigation.
    */
    public static function setActive($path, $active = 'current-menu-item') {
        return  Request::is($path) ? $active : '';
    }
}
