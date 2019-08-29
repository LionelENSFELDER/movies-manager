<?php

//globale app class used everywhere
class App {
    //globale var
    protected $db;
    protected $user;
    protected $auth;
    protected $accountName;

    public function __construct() {
        //init
        $this->init();
    }

    public function getUser(){
        return $this->user;
    }

    public function getDb(){
        return $this->db;
    }

    public function getAuth(){
        $this->auth = $this->user->getAuth();
        return $this->auth;
    }

    public function getAccountName(){
        $this->accountName = $this->user->getAccountName();
        return $this->accountName;
    }

    public function getProfilePic(){
        $accountId = $this->user->getAccountId();

        $accountPic = $this->user->getAccountPic($accountId, $this->db);

        return $accountPic;
    }

    protected function init(){
        try{
            $this->db = DataBase::getDataBase();
        }catch(PDOException $e){
            echo 'Fail : ' . $e->getMessage();
        }

        $this->user = new User($this->db);
        $this->auth = $this->user->getAuth();

    }


    public static $__inst = null;
    public static function Get(){
        if(!self::$__inst){
            self::$__inst = new App();
        }
        return self::$__inst;
    }
}