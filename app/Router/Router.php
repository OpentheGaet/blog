<?php

namespace app\Router;

use app\Helper\Filter;
use app\Router\Controller;

class Router 
{
    private $baseDir;
    private $location;
    private $action = false;
    private $param = false;

    public function __construct($baseDir, $location, $get)
    {
        $this->baseDir = $baseDir;
        $this->location = $location;
        $this->setAction($get);
    }

    private function setAction($get)
    {
        if (isset($get['action'])) {
            $this->action = Filter::checkAction($get['action']);
        }
        if (isset($get['param'])) {
            $this->param = Filter::checkParam($get['param']);
        }
        $this->setController();
    }

    private function setController()
    {
        $action = $this->action;
        if ($action == '') {
            $action = 'Home';
        }
        $ins = new Controller();
        $controller = $ins->loadController(
            $action, 
            $this->baseDir,
            $this->location,
            null
        );
        $method = $ins->loadMethod($action);
        $object = 'Controller'.$action;
        $ins = new $object();
        $controller = $ins->$method();
        return $controller;
    }
}