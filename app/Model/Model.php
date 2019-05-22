<?php

namespace app\Model;

use PDO;
use app\Model\Config;

class Model {

    private static $instance = null;

    public static function getInstance() {
        if (!self::$instance) {
            try {    
                $config = Config::configurate();
                self::$instance = new PDO($config['dns'], $config['user'], $config['pass']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$instance; 
            }
            catch(\Exception $e) {
                die('<p><b>Error, no connexion engaged : <span style="color:red">'.$e->getMessage().'</span></b></p>');
            }  
        }
    }
}