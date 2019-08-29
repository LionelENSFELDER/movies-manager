<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting( E_ALL );

    // require_once('movies_manager.php');
    // require_once('auth_class.php');
    //require_once('./src/auth_auth.php');
    // require_once('movie.php');
    //require_once('movie_view.php');
    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.php';
    });

    $app = App::Get();
    $db = $app->getDb();
    $user = $app->getUser();
    $user->cookie_login();
    $auth = $app->getAuth();



    require_once('./templates/navbar.php');

    

    // 1ere version
    // try{
    //     $db = DataBase::getDataBase();
    // }catch(PDOException $e){
    //     echo 'Fail : ' . $e->getMessage();
    // }
      

    // $user = new User($db);

    // $user->cookie_login();

    // $auth = $user->getAuth();

    // $accountId = $user->getAccountId();

    // $accountName = $user->getAccountName();

    // $accountPic = $user->getAccountPic($accountId, $db);


    // 2eme version
    // $app = [
    //     "db" => $db,
    //     "user" => $user,
    //     "auth" => $auth
    // ];

    // $app["auth"];
    

    // 3eme version
    //$app = App::Get();

    // 4eme version
    // $app = App::Get(DataBase::class);




// As singleton
// class App {

//     protected $db;
//     protected $user;

//     public function __construct($DataBaseClass) {
        
//         $this->init($DataBaseClass);
//     }

//     public function getUser(){
//         return $this->user;
//     }

//     public function getDb(){
//         return $this->db;
//     }

//     public function getProfilePic(){
//         $accountId = $this->user->getAccountId();

//         $accountPic = $this->user->getAccountPic($accountId, $this->db);

//         return $accountPic;
//     }

//     protected function init($DataBaseClass){
//         try{
//             $this->db = $DataBaseClass::getDataBase();
//         }catch(PDOException $e){
//             echo 'Fail : ' . $e->getMessage();
//         }

//         $this->user = new User($this->db);

//         $this->user->cookie_login();
//     }


//     public static $__inst = null;
//     public static function Get($DataBaseClass = DataBase){
//         if(!self::$__inst){
//             self::$__inst = new App($DataBaseClass);
//         }
//         return self::$__inst;
//     }
// }