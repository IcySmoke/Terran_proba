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
        // load views
        require APP . 'view/_templates/user_header.php';
        require APP . 'view/user/login.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: register
     * route: /user/register
     */
    public function register()
    {
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

                $user->newUser($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['password']);

            }


        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/user/register.php';
        require APP . 'view/_templates/footer.php';
    }
}