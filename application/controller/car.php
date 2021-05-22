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
        require APP . "model/car.php";
        require APP . "model/user.php";

        $filter = [
            'user' => UserModel::findOneBy('email', $_SESSION['user'])->id,
        ];

        if(isset($_POST['filter_brand'])){
            $filter += [
                'brand' => $_POST['filter_brand'],
            ];
        }

        if(isset($_POST['filter_plate'])){
            $filter += [
              'plate' => $_POST['filter_plate']
            ];
        }

        $cars = CarModel::findBy($filter);

        // load views
        if($_SESSION['admin']){
            require APP . 'view/_templates/admin_header.php';
        }else{
            require APP . 'view/_templates/user_header.php';
        }
        require APP . 'view/car/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function edit(){

        if(!isset($_GET['id'])){
            header('location: ' . URL);
        }

        if(!is_numeric($_GET['id'])){
            header('location: ' . URL);
        }

        require APP . "model/car.php";

        $res = CarModel::findOneBy('id', $_GET['id']);
        if(!$res || $res->user != $_SESSION['userId']){
            header('location: ' . URL);
        }

        $car = new CarModel($res);

        if(isset($_POST['submit_editCar'])){
            $car
                ->setBrand($_POST['brand'])
                ->setPlate($_POST['plate'])
                ->setKilometers($_POST['kilometers'])
                ->setYear($_POST['year'])
                ->setStatus(isset($_POST['status']))
            ;

            $car->update();
        }



        // load views
        require APP . 'view/_templates/user_header.php';
        require APP . 'view/car/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add(){

        if(isset($_POST['submit_addCar'])){

            $_SESSION['newCar_error'] = null;

            if(strlen($_POST['plate']) != 7){
                $_SESSION['newCar_error']['invalid_plate'] = true;
            }

            if($_POST['year'] > date("Y")){
                $_SESSION['newCar_error']['invalid_year'] = true;
            }

            if($_SESSION['newCar_error'] == null){
                require APP . "model/car.php";
                require APP . "model/user.php";

                $car = new CarModel();

                $car->newCar(
                    $_POST['brand'],
                    $_POST['plate'],
                    $_POST['kilometers'],
                    $_POST['year'],
                    isset($_POST['status'])?1:0,
                    UserModel::findOneBy('email', $_SESSION['user'])->id
                );
                header('location: ' . URL . 'car');
            }

        }

        // load views
        require APP . 'view/_templates/user_header.php';
        require APP . 'view/car/add.php';
        require APP . 'view/_templates/footer.php';

    }

    public function delete(){
        if(!isset($_GET['id'])){
            header('location: ' . URL);
        }

        if(!is_numeric($_GET['id'])){
            header('location: ' . URL);
        }

        require APP . "model/car.php";

        $res = CarModel::findOneBy('id', $_GET['id']);
        if(!$res || $res->user != $_SESSION['userId']){
            header('location: ' . URL);
        }

        CarModel::delete($res->id);

        header('location: ' . URL);
    }
}