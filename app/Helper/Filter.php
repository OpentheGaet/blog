<?php

namespace app\Helper;

use app\Security\RouteTable;

final class Filter
{
    static public function checkAction($action)
    {
        $rTable = RouteTable::setTable();
        if (isset($action) AND $action !== '' AND in_array($action, $rTable)) {
            return $action;
        }
        $action = false;
        return $action;
    }

    static function setParam($param)
    {
        $reg = '/^[0-9]*$/';
        if(!empty($param) AND preg_match($reg, $param, $match)) {
            $id = $param;
            return $id;
        }
        $id = 0;
        return $id;
    }

    static public function checkParam($param)
    {
        if (isset($param) AND $param !== '') {
            return $param;
        }
        $param = false;
        return $param;
    }

    static public function cleanForm($post)
    {
        $HtmlMatch = '#<(?:/([a-zA-Z1-6]+)|([a-zA-Z1-6]+)(?: +[a-zA-Z]+="[^"]*")*( ?/)?)>#';
        if (preg_match($HtmlMatch, $post, $match)) {
            return false;
        } 
        return htmlspecialchars($post, ENT_QUOTES, 'UTF-8', false);
    }

    static public function checkInt($post)
    {
        $reg = '/^[0-9]*$/';
        if (preg_match($reg, $post, $match) AND $post != '') {
            $int = self::cleanForm($post);
            return $int;
        }
        $int = false;
        return $int;
    }

    static public function checkString($post)
    {
        if (is_string($post) AND $post != '') {
            $string = self::cleanForm($post);
            return $string;
        }
        $string = false;
        return $string;
    }

    static public function checkLetters($post)
    {
        $reg = '/^[A-Za-z]/';
        if (preg_match($reg, $post, $match) AND $post != '') {
            $letters = self::cleanForm($post);
            return $letters;
        }
        $letters = false;
        return $letters;
    }

    static public function checkMail($post)
    {
        $reg = '/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
        if (preg_match($reg, $post, $match) AND $post != '') {
            $mail = self::cleanForm($post);
            return $mail;
        }
        $mail = false;
        return $mail;
    }

    static public function checkBool($post)
    {
        if (is_int($post) AND $post != '' AND $post == '1') {
            $bool = true;
            return $bool;
        }
        $bool = false;
        return $bool;
    }
}