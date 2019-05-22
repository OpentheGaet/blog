<?php

namespace app\Router;

use app\Router\View;

class Controller
{
    private $view;

    public function loadController($action, $baseDir, $location, $token)
    {
        $baseDir = $baseDir;
        $dir = 'controller/';
        $controller = '/Controller'.$action;
        $ext = '.php';
        $path = $location.$dir.$baseDir.$controller.$ext;
        if (file_exists($path)) {
            $token;
            return require($path);
        }
        $error = 'the file '.$controller.' does not exist';
        echo $error;           
        return;
    }

    public function loadMethod($action)
    {
        return $action;
    }

    protected function loadComponents($action, $data = []) 
    {
        $this->view = new view($action, $data);
        $this->view->loadView();
        return;
    }

    protected function redirectToRoute($get) 
    {
        header('location:./?action='.$get.'');
        return;
    }
}

