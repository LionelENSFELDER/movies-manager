<?php
    

    //globale app class used everywhere

    class App {
        //globale var
        protected $db;
        protected $user;
        protected $auth;
        protected $accountName;
        protected $accountId;
        protected $twig;

        public function __construct() {
            //init
            $this->init();
        }

        public function getTwig(){
            return $this->twig;
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

        public function getAccountId(){
            $this->accountId = $this->user->getAccountId();
            return $this->accountId;
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


            $loader = new \Twig\Loader\FilesystemLoader('./templates');
            $this->twig = new \Twig\Environment($loader, [
                'cache' => false //disable cache - - for enable carche: 'cache' => './cache/twig'
            ]);
        }


        public static $__inst = null;
        public static function Get(){
            if(!self::$__inst){
                self::$__inst = new App();
            }
            return self::$__inst;
        }
    }