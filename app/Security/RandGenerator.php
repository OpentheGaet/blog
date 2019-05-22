<?php

namespace app\Security;

use app\Security\AESTools;

abstract class RandGenerator
{
    private static $tools;

    private function generateRand()
    {
        $key = rand(10000, 10000000000000000);
        return $key;
    }

    private static function setTools()
    {
        if(is_null(self::$tools)){
            self::$tools = new AESTools();
        }
        return self::$tools;
    }

    protected function setRandomKey()
    {
        $tools = self::setTools();
        $crypt = $tools->cryptoJsAesEncrypt($_SESSION['query']['queryPass'], self::generateRand());
        return $crypt;
    }

    public static function setPass()
    {
        $_SESSION['query']['queryPass'] = ''.self::generateRand().'';
        return $_SESSION['query']['queryPass'];
    }

    public static function setKeyTable($session, $pass)
    {
        $numTable = '';
        $tools = self::setTools();
        foreach ($session as $row) {
            $numTable .= '/' . $tools->cryptoJsAesDecrypt($pass, $row);
        }
        $array = explode('/', $numTable);
        unset($array[0]);
        return $array;
    }

}
