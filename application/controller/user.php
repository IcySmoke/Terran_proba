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
            $_SESSION['register_form_error'] = [];

            if(!isset($_POST['firstName'])) if($_POST['firstName'] == ''){
                array_push($_SESSION['register_form_error'], "Kérlek add meg a vezetékneved.");
            }

            if(!isset($_POST['lastName'])) if($_POST['lastName'] == ''){
                array_push($_SESSION['register_form_error'], "Kérlek add meg a családnevedet.");
            }

        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/user/register.php';
        require APP . 'view/_templates/footer.php';
    }
}