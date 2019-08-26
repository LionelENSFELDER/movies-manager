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
        return $this->auth;
    }    
    //
    public function getProfilePic(){
        $accountId = $this->user->getAccountId();

        $accountPic = $this->user->getAccountPic();

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

        // $this->accountName = $this->user->getAccountName();

        $this->user->cookie_login();

    }


    public static $__inst = null;
    public static function Get(){
        if(!self::$__inst){
            self::$__inst = new App();
        }
        return self::$__inst;
    }
}