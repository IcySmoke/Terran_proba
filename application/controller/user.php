<?php

/**
 * Class User
 *
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
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/user/register.php';
        require APP . 'view/_templates/footer.php';
    }
}