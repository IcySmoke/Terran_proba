<?php

/**
 * Class Home
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * route: /home/index
     */
    public function index()
    {
        header('location: ' . URL . 'user/login');
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
