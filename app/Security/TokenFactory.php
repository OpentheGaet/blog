<?php

namespace app\Security;

use app\Security\RandGenerator;

class TokenFactory extends RandGenerator
{
    public static function setPagesSessions()
    {
        $_SESSION['action']['Home']     = parent::setRandomKey();
        $_SESSION['action']['Albums']   = parent::setRandomKey();
        $_SESSION['action']['Album']    = parent::setRandomKey();
        $_SESSION['action']['Artists']  = parent::setRandomKey();
        $_SESSION['action']['Styles']   = parent::setRandomKey();
        $_SESSION['action']['Register'] = parent::setRandomKey();
        return $_SESSION['action'];
    }

    public static function setAJAXSessions()
    {
        $_SESSION['query']['component-album']    = parent::setRandomKey();
        $_SESSION['query']['component-style']    = parent::setRandomKey();
        $_SESSION['query']['component-artist']   = parent::setRandomKey();
        $_SESSION['query']['component-register'] = parent::setRandomKey();
        return $_SESSION['query'];
    }
}