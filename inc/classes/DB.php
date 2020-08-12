<?php

if(!defined('__CONFIG__')){
    exit('You do not have a config file!');
}

Class DB{
    protected static $con;

    private function __construct(){
        try{
            self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=skulla-mrox-php','root','root');
            self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute( PDO::ATTR_PERSISTENT, false);
        }catch(PDOException $e){
            echo "Could not connect to the Database";
            exit;
        }
    }

    public static function getConnection(){
        if(!self::$con){
            new DB();
        }

        return self::$con;
    }
}

?>