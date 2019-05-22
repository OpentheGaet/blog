<?php

namespace app\Model;

use PDO;
use app\Model\Model;

class Query
{
    private $sql;
    private $param;
    private $data;

    function __construct($data = [], $param = [])
    {
        $this->param = $param;
        $this->sql = $data;
    }

    public function readData() 
    {
        $db = Model::getInstance();
        if ($this->param == null) {
            $result = $db->prepare($this->sql);
            $result->execute();
            $this->getData($result);
            return;
        }
        $result = $db->prepare($this->sql);
        $result->execute([$this->param]);
        $this->getData($result);
        return;
    }

    private function getData($result)
    {
        if ($this->param == null) {
            while ($rows = $result->fetchAll()) {
                $this->data = $rows;
            }
            return;
        }
        $this->data = $result->fetch();
        return;
    }

    public function fetchData()
    {
        $this->readData();
        return $this->data;
    }

    public function prepareData()
    {
        $db = Model::getInstance();
        $query= $db->prepare($this->sql);
        $result = $query->execute($this->param);
        return $result;
    }

    public function sendData()
    {
        $result = $this->prepareData();
        if ($result != 1) {
            $result = false;
            return $result;
        }
        $result = true;
        return $result;
    }

}    