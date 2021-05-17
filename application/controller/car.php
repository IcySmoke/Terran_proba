<?php

/**
 * Class car
 */
class car extends Controller
{
    public function __construct()
    {
        if(!isset($_SESSION['user'])){
            header('location: ' . URL);
        }
    }

    public function index()
    {
        // load views
        require APP . 'view/_templates/user_header.php';
        require APP . 'view/car/index.php';
        require APP . 'view/_templates/footer.php';
    }
}