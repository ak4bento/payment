<?php

Namespace Akill\Payment\Helpers;

class Validator
{
    public static function config($condition){
        if ($condition)
            die('Please complete the Doku Laravel settings');
    }
}
