<?php

namespace Code\DB;

class Connection
{
    private static $instance = null;

    private function __construct()
    {

    }    

    private function __wakeup()
    {

    }

    private function __clone()
    {

    }


    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new \PDO('mysql:dbname=my_expenses;host=localhost','root','');            
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->exec('SET NAMES UTF8');
        }

        return self::$instance;
    }
}