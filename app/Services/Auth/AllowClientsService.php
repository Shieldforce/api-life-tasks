<?php

namespace App\Services\Auth;

class AllowClientsService
{
    public static function getArray()
    {
        return [
            "postman",
            "app",
            "front"
        ];
    }

    public static function getString()
    {
        return implode("," , self::getArray());
    }
}