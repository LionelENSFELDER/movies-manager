<?php


class AuthController extends BaseController {

    public function login(){
        if (isset($_POST['name']) AND isset($_POST['password'])){

            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $user = $this->app->getUser();
            $auth = $user->login($name, $password);
        }

        return $this->render('login.twig', [
            
        ]);
    }

    public function signup(){
        if (isset($_POST['name']) AND isset($_POST['password'])){

            $username = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        
            $res = $user->add_account($username, $password, $db);
            
            if($res === TRUE){
                header('location:login.php');
            }else if($res === FALSE){
                echo 'Fail !';
            }
        }

        return $this->render('signup.twig', [
            'auth'=> $this->getAuth()
        ]);
    }

    public function logout(){

        $user = $this->app->getUser();
        $user->logout();
        header('location:index.php');
    }

    public function profile_view(){

        $accountName = $this->app->getAccountName();
        $accountPic = $this->app->getProfilePic();

        if(isset($_POST['edit_profile'])){
            return $this->render('edit_account.twig', [
                'accountName' => $accountName,
                'accountPic' => $accountPic,
                'auth'=> $this->getAuth()
            ]);
        }

        return $this->render('profile.twig', [
            'accountName' => $accountName,
            'accountPic' => $accountPic,
            'auth'=> $this->getAuth()
        ]);

    }

    public function prepare_edit_account(){
        return $this->render('edit_account.twig', [
            'auth'=> $this->getAuth()
        ]);
    }

    public function edit_account(){

        if(isset($_POST['submit'])){
            if($_POST['name']===null){
                $username=$accountName;
                $password = $_POST['password'];
                $accountId = $user->getAccountId();
                $user->edit_account($accountId, $db, $username, $password);
                header('location:profile.php');
            }else{
                $username = $_POST['name'];
                $password = $_POST['password'];
                $accountId = $user->getAccountId();
                $user->edit_account($accountId, $db, $username, $password);
                header('location:profile.php');
            }
        }else{
            echo 'Nothing posted';
        }

        return $this->render('edit_account.twig');
    }

}

