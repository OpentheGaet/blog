<?php

use app\Controller;
use app\Filter;
use model\Album;

class ControllerTest extends Controller
{
    public function Test()
    {      
        $this->loadResult('../views/admin/Test', null);
    }
}
