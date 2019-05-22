<?php

use app\Security\RouteTable;

class Header
{
    public function setTitle()
    {  
        $title = RouteTable::setTable();
        $Tlength = count($title);

        if(isset($_GET['action'])){
            $page = $_GET['action'];
            if(in_array($page, $title)){
			    return $page;
            }
        }
        $page = 'Home';
        return $page;    
    }

    public function setMenu()
    {
        $menu = [
            'Albums',
            'Styles',
            'Artists'
        ];
        return $menu;
    }
}

$data = new Header();
$title = $data->setTitle();
$menu = $data->setMenu();

