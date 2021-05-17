<?php

class Controller
{

    /**
     * @var null Model
     */
    public $model = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
//    function __construct()
//    {
//        $this->loadModel();
//    }
//
//    /**
//     * Loads the model.
//     * @return object model
//     */
//    public function loadModel()
//    {
//        require APP . 'core/model.php';
//        // create new model (and pass the database connection)
//        $this->model = new Model();
//    }
}
