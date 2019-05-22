<?php

use app\Router\Controller;
use app\Model\Query;
use model\Style;

class ControllerStyles extends Controller
{
    private $styles;
    
    public function __construct()
    {
        $this->styles = new Style;
    }

    private function fetchStyles()
    {
        $styles = $this->styles->getStyle();
        $result = new Query($styles, null);
        $fetch = $result->fetchData();
        return $fetch;
    }

    public function Styles()
    {
        $styles = $this->fetchStyles();
        $this->loadComponents('views/user/components-style/html/component-style', $styles, null);
    }
}



