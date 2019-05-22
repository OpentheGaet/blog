<?php

use app\Router\Controller;
use app\Model\Query;
use app\Helper\Filter;
use model\User;

class ControllerRegister extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getRegister($param)
    {
        $array = [
            'login' => Filter::checkString($param['login']),
            'pass'  => Filter::checkString($param['pass']),
            'date'  => Filter::checkString($param['date']),
            'level' => Filter::checkString($param['level'])
        ];
        if (in_array(false, $array)) {
            $array = false;
            $this->redirectToRoute('Error');
            return;
        }
        $sql = $this->user->createUser();
        $query = new Query($sql, $array);
        $query->sendData();
        $this->redirectToRoute('Home');
        return;
    }

    public function Register()
    {
        $this->loadComponents('views/user/components-register/html/component-register', null, null);
    }
}