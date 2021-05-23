<?php

/**
 * Class Home
 *
 */
class Home
{
    /**
     * PAGE: index
     * route: /home/index
     */
    public function index()
    {
        header('location: ' . URL . 'user/login');
    }
}
