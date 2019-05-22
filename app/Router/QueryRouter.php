<?php

namespace app\Router;

use app\Router\Controller;
use app\Security\RandGenerator;
use app\Security\AESTools;

class QueryRouter
{
    private $baseDir;
    private $action;
    private $data = [];
    private $method;
    private $token;
    private $session;
    private $tools;
    private $pass;
    private $query;

    public function __construct(AESTools $tools, $baseDir, $query = [])
    {
        $this->tools = $tools;
        $this->baseDir = $baseDir;
        $this->pass = $_SESSION['query']['queryPass'];
        $this->session  = RandGenerator::setKeyTable($_SESSION['query'], $this->pass);
        $this->setQueryByType($this->pass, $query);
    }

    private function setQueryByType($pass, $query)
    {
        if (isset($query['ajax'])) {
            $this->setAjaxQuery($pass, $query);
        } 
        else if (isset($query['php'])) {
            $this->setPhpQuery($pass, $query);
        }
        return;
    }

    private function translateAES($pass, $data)
    {
        $decrypt = $this->tools->cryptoJsAesDecrypt($pass, $data);
        return $decrypt;
    }

    private function checkTokenAndData()
    {
        if (!in_array($this->token, $this->session) OR $this->data == '') {
            return false;
        }
        return true;
    }

    private function setPhpQuery($pass, $query)
    {
        if (isset($query['tk_php']) AND $query['tk_php'] != '') {
            $this->token = $this->translateAES($pass, $query['tk_php']);
            $this->data  = $query;
            unset($query['tk_php']);
            $check = $this->checkTokenAndData();
            if ($check == false) {
                header('location:./?action=Error&amp;param=noTokenOrNoData');
                return;
            }
            $this->setActionAndMethod();
            return; 
        }
        header('location:./?action=Error&amp;param=noToken');
        return;
    }

    private function setAjaxQuery($pass, $query)
    {
        if (isset($query['tk_ajax']) AND $query['tk_ajax'] != '') {
            $this->token = $this->translateAES($pass, $query['tk_ajax']);
            $this->data  = $this->translateAES('AJAX', $query['ajax']);
            $check = $this->checkTokenAndData();
            if ($check == false) {
                return false;
            }
            $this->setActionAndMethod();
            return;
        }
        return false;
    }

    private function setActionAndMethod()
    {
        $this->action = $this->data['action'];
        $this->method = $this->data['method'];
        $this->setController();
        return;
    }

    private function setController()
    {
        $ins = new Controller();
        $ins->loadController(
            $this->action, 
            $this->baseDir,
            null,
            $this->token
        );
        $object = 'Controller'.$this->action;
        $ins = new $object();
        $method = $ins->loadMethod($this->method);
        $this->query = $ins->$method($this->data);
        return;
    }

    public function AJAXResponse()
    {
        $response = $this->tools->cryptoJsAesEncrypt('AJAX', $this->query);
        return $response;
    }
}
