<?php

namespace app\Router;

class View
{
    private $data = [];
    private $view;

    public function __construct($action, $data)
    {
        $this->view  = $action;
        $this->data  = $data;
    }

    public function loadView()
    {
        $view = $this->view;
        $ext = '.html.php';
        $path = $view.$ext;
        if (file_exists($path)) {
            $fetch = $this->data;
            return require($path);
        }
        else {
            echo 'the file'.$view.' does not exist';
        }
    }
}