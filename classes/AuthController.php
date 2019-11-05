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

        //$user = $this->app->getUser();
        $db = $this->app->getDb();

        if (isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['password-repeated'])){
            if($_POST['password'] === $_POST['password-repeated']){

                $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                //upload tests
                if (isset($_FILES['account-pic']) 
                AND $_FILES['account-pic']['error'] == 0 
                AND mime_content_type($_FILES['account-pic']['tmp_name']) == 'image/jpeg' 
                AND $_FILES['account-pic']['size'] <= 1000000){

                    $upload_dir = 'assets/avatars/';
                    chmod("assets/avatars", 0777);
                    $file_infos = pathinfo($_FILES['account-pic']['name']);
                    $tmp_name = $_FILES['account-pic']["tmp_name"];
                    $extension_upload = $file_infos['extension'];
                    $valid_extensions = array('jpg', 'jpeg', 'gif', 'png');
                    $check_extension = in_array($extension_upload, $valid_extensions);

                    if ($check_extension === TRUE){
                        $move = move_uploaded_file($tmp_name, $upload_dir.$username.'.'.$extension_upload);
                        if($move === TRUE){
                            $account_pic = $upload_dir.$username.'.'.$extension_upload;
                        }else{
                            $account_pic = 'assets/avatars/default.jpg';
                        }
                    }else{
                        $account_pic = 'assets/avatars/default.jpg';
                    }
                }else{
                    $account_pic = 'assets/avatars/default.jpg';
                }
                //end upload tests

                $res = User::add_account($username, $password, $db, $account_pic);

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
        $account_id = $this->app->getAccountId();
        $account_name = $this->app->getAccountName();
        $account_pic = $this->app->getProfilePic();

        return $this->render('view_account.twig', [
            'account_id' => $account_id,
            'account_name' => $account_name,
            'account_pic' => $account_pic,
            'auth'=> $this->getAuth()
        ]);
    }

    public function change_username(){
        $account_id = $this->app->getAccountId();
        $db = $this->app->getDb();


        if(isset($_POST['new-account-name']) AND isset($_POST['current-password'])){

            $current_password = filter_var($_POST['current-password'], FILTER_SANITIZE_STRING);
            $current_password = password_hash($current_password, PASSWORD_DEFAULT);

            try{
                $sql_password_set = 'SELECT account_password FROM accounts WHERE (account_id = ?)';
                $query_password_set = $db->prepare($sql_password_set);
                $query_password_set->execute(array($account_id));
                $array_password_set = $query_password_set->fetchAll(PDO::FETCH_COLUMN, 0);
                $password_set = $array_password_set[0];
    
            }catch (PDOException $e){
                echo $e->getMessage();
            }

            if($current_password = $password_set){
                $username = filter_var($_POST['new-account-name'], FILTER_SANITIZE_STRING);

                try{
                    //remplace global $db ?
                    global $db;
                    $sql_account_pic = 'SELECT account_pic FROM accounts WHERE (account_id = ?)';
                    $query_account_pic = $db->prepare($sql_account_pic);
                    $query_account_pic->execute(array($account_id));
                    $array = $query_account_pic->fetchAll(PDO::FETCH_COLUMN, 0);
                    $old_account_pic = $array[0];
        
                }catch (PDOException $e){
                    echo $e->getMessage();
                }

                $default_account_pic = 'assets/avatars/default.jpg';

                if($old_account_pic === $default_account_pic){
                    //do nothing
                }else if ($old_account_pic != $default_account_pic){
                    $pic = 'assets/avatars/'.$username.'.jpg';
                    rename($old_account_pic, $pic);
                }

                $res = User::edit_account($account_id, $db, $username, $password = NULL, $pic);
                
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
        $account_id = $this->app->getAccountId();
        $db = $this->app->getDb();

        $current_password_to_check = filter_var($_POST['current-password'], FILTER_SANITIZE_STRING);
        $current_password = password_hash($current_password_to_check, PASSWORD_DEFAULT);

        try{
            $sql_password_set = 'SELECT account_password FROM accounts WHERE (account_id = ?)';
            $query_password_set = $db->prepare($sql_password_set);
            $query_password_set->execute(array($account_id));
            $array_password_set = $query_password_set->fetchAll(PDO::FETCH_COLUMN, 0);
            $password_set = $array_password_set[0];

        }catch (PDOException $e){
            echo $e->getMessage();
        }

        if($current_password = $password_set){
            $password = filter_var($_POST['new-password'], FILTER_SANITIZE_STRING);
            $password_repeated = filter_var($_POST['new-password-repeated'], FILTER_SANITIZE_STRING);
            if($password = $password_repeated){
                $res = User::edit_account($account_id, $db, $username = NULL, $password, $pic = NULL);
                if($res === TRUE){
                    $this->logout();
                }else if($res === FALSE){
                    echo 'Fail !';
                }
            }else{
                
            }
        }else{
            
        }
    }

    public function update_pic(){

        $account_id = $_POST['account_id'];
        $account_name = $_POST['account_name'];
        $db = $this->app->getDb();

        //upload tests
        if (isset($_FILES['new-account-pic']) 
        AND $_FILES['new-account-pic']['error'] == 0 
        AND mime_content_type($_FILES['new-account-pic']['tmp_name']) == 'image/jpeg' 
        AND $_FILES['new-account-pic']['size'] <= 1000000){

            $upload_dir = 'assets/avatars/';
            $file_infos = pathinfo($_FILES['new-account-pic']['name']);
            $tmp_name = $_FILES['new-account-pic']["tmp_name"];
            $extension_upload = $file_infos['extension'];
            $valid_extensions = array('jpg', 'jpeg');
            $check_extension = in_array($extension_upload, $valid_extensions);

            if ($check_extension === TRUE){
                $move = move_uploaded_file($tmp_name, $upload_dir.$account_name.'.'.$extension_upload);
                if($move === TRUE){
                    $pic = $upload_dir.$account_name.'.'.$extension_upload;

                }else{
                    $pic = 'assets/avatars/default.jpg';
                }
            }else{
                $pic = 'assets/avatars/default.jpg';
            }
        }else{
            $pic = 'assets/avatars/default.jpg';
        }
        //end upload tests

        $res = User::edit_account($account_id, $db, $username = NULL, $password = NULL, $pic);

        if($res === TRUE){
            header('location:view_account.php');
        }else if($res === FALSE){
            echo 'Fail !';
        }
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

