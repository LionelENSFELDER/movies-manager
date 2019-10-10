<?php
    class DataBase{
        protected static $db;

        //protected function __construct() { };

        public static function getDataBase(){
            if(!isset(self::$db)){
                self::$db = new PDO('mysql:host=localhost;dbname=movies;charset=utf8', 'root', 'root');
            };
            return self::$db;
        }
    }
?>