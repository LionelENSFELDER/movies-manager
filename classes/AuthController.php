<?php


class AuthController extends BaseController {

    public function login(){
        if (isset($_POST['name']) AND isset($_POST['password'])){

            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $user = $this->app->getUser();
            $auth = $user->login($name, $password);
            header('location:login.php');
        }

        return $this->render('login.twig', [
            
        ]);
    }

    public function add_account(){
        $user = $this->app->getUser();
        $db = $this->app->getDb();

        if (isset($_POST['name']) AND isset($_POST['password'])){

            $username = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        
            $res = User::add_account($username, $password, $db);
            
            if($res === TRUE){
                header('location:login.php');
            }else if($res === FALSE){
                echo 'Fail !';
            }
        }

        return $this->render('add_account.twig', [
            'auth'=> $this->getAuth()
        ]);
    }

    public function logout(){

        $user = $this->app->getUser();
        $user->logout();
        header('location:index.php');
    }

    public function view_account(){

        $accountName = $this->app->getAccountName();
        $accountPic = $this->app->getProfilePic();

        // if(isset($_POST['edit_account'])){
        //     return $this->render('edit_account.twig', [
        //         'accountName' => $accountName,
        //         'accountPic' => $accountPic,
        //         'auth'=> $this->getAuth()
        //     ]);
        // }

        return $this->render('view_account.twig', [
            'accountName' => $accountName,
            'accountPic' => $accountPic,
            'auth'=> $this->getAuth()
        ]);

    }

    // public function prepare_edit_account(){
    //     return $this->render('edit_account.twig', [
    //         'auth'=> $this->getAuth()
    //     ]);
    // }

    public function edit_account(){
        $accountName = $this->app->getAccountName();
        $accountPic = $this->app->getProfilePic();
        $accountId = $this->app->getAccountId();
        $db = $this->app->getDb();

        if(isset($_POST['send'])){

            $username=$_POST['name'];
            $password = $_POST['password'];
            $accountId = $accountId;

            $res = User::edit_account($accountId, $db, $username, $password);

            if($res === TRUE){
                header('location:index.php');
            }else if($res === FALSE){
                echo 'Fail !';
            }

        }

        // if(isset($_POST['delete'])){
        //     $this->delete_account();
        // }

        return $this->render('edit_account.twig', [
            'accountName' => $accountName,
            'accountPic' => $accountPic,
            'auth'=> $this->getAuth()
        ]);
    }

    public function delete_account(){
        $accountId = $this->app->getAccountId();
        $db = $this->app->getDb();
        $res = User::delete_account($accountId, $db);

        if($res === TRUE){
            header('location:add_account.php');
        }else if($res === FALSE){
            echo 'Fail !';
        }
    }

}

