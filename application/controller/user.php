<?php

/**
 * Class user
 */
class user extends Controller
{
    /**
     * PAGE: login
     * route: /user/login
     */
    public function login()
    {
        if(isset($_SESSION['user'])){
            header('location: ' . URL . 'car');
        }

        require APP . "model/user.php";

        if(isset($_POST['submit_login'])){

            $user = UserModel::findOneBy('email', $_POST['email']);

            if(!$user){
                $_SESSION['login_form_error']['email'] = true;
            }elseif(!password_verify($_POST['password'], $user->pass)){
                $_SESSION['login_form_error']['password'] = true;
            }else{
                unset($_POST);
                $_SESSION['userId'] = $user->id;
                $_SESSION['user'] = $user->email;
                $_SESSION['admin'] = $user->admin;
                header('location: ' . URL . 'car');
            }
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/user/login.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: register
     * route: /user/register
     */
    public function register()
    {
        if(isset($_SESSION['user'])){
            header('location: ' . URL . 'car');
        }

        if(isset($_POST['submit_register'])){
            require APP . "model/user.php";
            $_SESSION['register_form_error'] = null;

            if(!isset($_POST['firstName'])) if($_POST['firstName'] == ''){
                $_SESSION['register_form_error']['firstName_missing'] = true;
            }

            if(!isset($_POST['lastName'])) if($_POST['lastName'] == ''){
                $_SESSION['register_form_error']['lastName_missing'] = true;
            }

            if(!isset($_POST['email'])){
                $_SESSION['register_form_error']['emial_missing'] = true;
            }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['register_form_error']['emial_invalidFormat'] = true;
            }else{
                foreach(UserModel::findAll(['email']) as $row){
                    if($_POST['email'] == $row->email){
                        $_SESSION['register_form_error']['emial_exists'] = true;
                        break;
                    }
                }
            }

            //TODO phone regex check in else statement
            if(!isset($_POST['phone'])){
                $_SESSION['register_form_error']['phone_missing'] = true;
            }

            //TODO password check
            if(!isset($_POST['password'])){
                $_SESSION['register_form_error']['password_missing'] = true;
            }elseif(!isset($_POST['passwordAgain'])){
                $_SESSION['register_form_error']['passwordAgain_missing'] = true;
            }elseif($_POST['password'] != $_POST['passwordAgain']){
                $_SESSION['register_form_error']['passwords_missmatch'] = true;
            }

            if(!isset($_POST['terms'])){
                $_SESSION['register_form_error']['terms_unchecked'] = true;
            }

            if($_SESSION['register_form_error'] == null){
                $user = new UserModel();

                $res = $user->newUser($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['password']);

                if($res){
                    $_SESSION['userId'] = $user->getId();
                    $_SESSION['user'] = $user->getEmail();
                    $_SESSION['admin'] = $user->isAdmin();
                    header('location: ' . URL . 'car');
                }

            }


        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/user/register.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: logout
     * ROUTE: /user/logout
     */
    public function logout()
    {

        if(isset($_SESSION['user'])){
            $_SESSION = [];
        }

        header('location: ' . URL);
    }

}