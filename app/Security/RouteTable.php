<?php

namespace app\Security;

class RouteTable {

    static function setTable() 
    {
        $RTable = [
    #---------USER---------#
            'Home',
            'Albums',
            'Styles',
            'Artists',
            'Album',
            'Register',
            'Error',
    #---------ADMIN---------#
            'Test'
        ];
        return $RTable;
    }
}