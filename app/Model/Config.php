<?php
# A class has been created to instantiate the config data needed for the connexion to db

namespace app\Model;

class Config {

    static private $config = [];

    static function configurate() {

        self::$config = [
            'dns'  => 'your host access',
            'user' => 'your user access',
            'pass' => 'your pass access'
        ];

        return self::$config;

    }
}
