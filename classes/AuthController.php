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
            'page_title' => 'Login!',
        ]);
    }

    public function add_account(){
        $user = $this->app->getUser();
        $db = $this->app->getDb();

        if (isset($_POST['name']) AND isset($_POST['password']) AND isset($_POST['password-repeated'])){
            if($_POST['password'] === $_POST['password-repeated']){
                $username = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                $res = User::add_account($username, $password, $db);

                if($res === TRUE){
                    header('location:login.php');
                }else if($res === FALSE){
                    echo 'Fail !';
                }
            }else{
                echo 'Passwords not match !';
            }
        }else{
            echo 'You need to enter username AND password !';
        }

        return $this->render('add_account.twig', [
            'auth'=> $this->getAuth(),
            'page_title' => 'Add account',
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

    public function change_username(){
        $account_Id = $this->app->getAccountId();
        $db = $this->app->getDb();


        if(isset($_POST['new-account-name']) AND isset($_POST['current-password'])){

            $current_password = filter_var($_POST['current-password'], FILTER_SANITIZE_STRING);
            $current_password += password_hash($current_password, PASSWORD_DEFAULT);

            try{
                $sql_password_set = 'SELECT account_password FROM accounts WHERE (account_id = ?)';
                $query_password_set = $db->prepare($sql_password_set);
                $query_password_set->execute(array($account_Id));
                $array_password_set = $query_password_set->fetchAll(PDO::FETCH_COLUMN, 0);
                $password_set = $array_password_set[0];
    
            }catch (PDOException $e){
                echo $e->getMessage();
            }

            if($current_password = $password_set){
                $username = filter_var($_POST['new-account-name'], FILTER_SANITIZE_STRING);
                $res = User::edit_account($account_Id, $db, $username);
                
                if($res === TRUE){
                    header('location:view_account.php');
                }else if($res === FALSE){
                    echo 'Fail !';
                }
            }else{
                header('location:nope.php');
            }

        }else{
            header('location:nope.php');
        }

    }

    public function change_password(){
        $account_Id = $this->app->getAccountId();
        $db = $this->app->getDb();

        $current_password = filter_var($_POST['current-password'], FILTER_SANITIZE_STRING);
        $current_password += password_hash($current_password, PASSWORD_DEFAULT);

        try{
            $sql_password_set = 'SELECT account_password FROM accounts WHERE (account_id = ?)';
            $query_password_set = $db->prepare($sql_password_set);
            $query_password_set->execute(array($account_Id));
            $array_password_set = $query_password_set->fetchAll(PDO::FETCH_COLUMN, 0);
            $password_set = $array_password_set[0];

        }catch (PDOException $e){
            echo $e->getMessage();
        }

        if($current_password = $password_set){
            $password = filter_var($_POST['new-password'], FILTER_SANITIZE_STRING);
            $password_repeated = filter_var($_POST['new-password-repeated'], FILTER_SANITIZE_STRING);
            if($password = $password_repeated){
                $res = User::edit_account($account_Id, $db, $password);
                if($res === TRUE){
                    header('location:view_account.php');
                }else if($res === FALSE){
                    echo 'Fail !';
                }
            }else{
                
            }
        }else{
            
        }
    }

    public function edit_account(){
        $accountName = $this->app->getAccountName();
        $accountPic = $this->app->getProfilePic();
        $accountId = $this->app->getAccountId();
        $db = $this->app->getDb();

        if(isset($_POST['send'])){
            if($_POST['password'] === $_POST['password-repeated']){
                
            }
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

