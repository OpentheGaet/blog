<?php

namespace model;

class User{

    public function createUser()
    {
        $sql = 'INSERT INTO T_USER
                VALUES(NULL, :login, :pass, :date, :level)';
        return $sql;
    }

    public function getPublicUser() 
    {
        $sql = 'SELECT *
                FROM T_USER
                ORDER BY login ASC';
        return $sql;
    }
    
    public function getPublicAdmin() 
    {

        $sql = 'SELECT *
                FROM T_USER
                WHERE login = :login
                AND password = :password
                AND Level = 2';
        return $sql;
    } 
}