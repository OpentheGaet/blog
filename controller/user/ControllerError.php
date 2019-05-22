<?php

use app\Router\Controller;

class ControllerError extends Controller
{
    public function Error()
    {
        $this->loadComponents('views/user/components-error/html/component-error', null);
    }
}
