<?php

/**
 * Class car
 */
class CarModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $plate;

    /**
     * @var int
     */
    private $kilometers;

    /**
     * @var int
     */
    private $year;

    /**
     * @var bool
     */
    private $status;

    /**
     * @var relation
     */
    private $user;

    /**
     * @var datetime
     */
    private $createdAt;

    /**
     * @var datetime
     */
    private $updatedAt;

    public function __construct($car = null){
        if($car){

            $this->setBrand($car->brand);
            $this->setPlate($car->plate);
            $this->setKilometers($car->kilometers);
            $this->setYear($car->year);
            $this->setStatus($car->status);
            $this->setUser($car->user);

        }
    }

    private static function connect(){
        try {
            // set the optional options of the PDO connection. fetch mode to objects
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

            // generate a database connection, using the PDO connector
            return new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function newCar($barnd, $plate, $kilometers, $year, $status, $user){

        $this->setBrand($barnd);
        $this->setPlate($plate);
        $this->setKilometers($kilometers);
        $this->setYear($year);
        $this->setStatus($status);
        $this->setUser($user);

        $db = $this->connect();
        $sql = "INSERT INTO car (brand, plate, kilometers, year, status, user, created_at)
                VALUES (:brand, :plate, :kilometers, :year, :status, :user, :created_at)";

        $query = $db->prepare($sql);

        $parameters = [
            ':brand' => $this->brand,
            ':plate' => $this->plate,
            ':kilometers' => $this->kilometers,
            ':year' => $this->year,
            ':status' => $this->status,
            ':user' => $this->user,
            ':created_at' => date("Y-m-d h:i:s"),
        ];

        return $query->execute($parameters);
    }

    public function update(){
        $db = $this->connect();
        $sql = "UPDATE car
                SET brand = :brand, plate = :plate, kilometers = :kilometers, year = :year, status = :status, user = :user, updated_at = :updated_at
                WHERE id = :id";

        $query = $db->prepare($sql);

        $parameters = [
            ':brand' => $this->brand,
            ':plate' => $this->plate,
            ':kilometers' => $this->kilometers,
            ':year' => $this->year,
            ':status' => $this->status,
            ':user' => $this->user,
            ':updated_at' => date("Y-m-d h:i:s"),
            'id' => $_GET['id'],
        ];

        return $query->execute($parameters);

    }

    public static function delete($id){
        $db = self::connect();
        $sql = "DELETE FROM car WHERE id = :id";
        $query = $db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    /**
     * find all
     * @param null $columns
     * @return array
     */
    public static function findAll($columns = null){
        $db = self::connect();

        if($columns){
            $sql = "SELECT " . implode(', ', $columns) . " FROM car";
        }else{
            $sql = "SELECT * FROM car";
        }
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * @param $column
     * @param $value
     * @return false|mixed
     */
    public static function findOneBy($column, $value){
        $db = self::connect();

        $sql = "SELECT * FROM car WHERE $column = '$value'";

        $query = $db->prepare($sql);
        $query->execute();

        $res = $query->fetchAll();

        if($res){
            return $res[0];
        }

        return false;
    }

    /**
     * @param $column
     * @param $value
     * @return false|mixed
     */
    public static function findBy($filter){
        $db = self::connect();

        $sql = "SELECT * FROM car WHERE user = " . $filter['user'];

        if(count($filter) > 1){
            unset($filter['user']);
            foreach($filter as $key=>$value){
                $sql .= " AND " . $key . " LIKE '%" . $value . "%'";
            }
        }

        $query = $db->prepare($sql);
        $query->execute();

        $res = $query->fetchAll();

        if($res){
            return $res;
        }

        return false;
    }

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBrand(){
        return $this->brand;
    }

    /**
     * @param $brand
     * @return $this
     */
    public function setBrand($brand){
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlate(){
        return $this->plate;
    }

    /**
     * @param $plate
     * @return $this
     */
    public function setPlate($plate){
        $this->plate = $plate;
        return $this;
    }

    /**
     * @return int
     */
    public function getKilometers(){
        return $this->kilometers;
    }

    /**
     * @param $kilometers
     * @return $this
     */
    public function setKilometers($kilometers){
        $this->kilometers = $kilometers;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear(){
        return $this->year;
    }

    /**
     * @param $year
     * @return $this
     */
    public function setYear($year){
        $this->year = $year;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(){
        return $this->status;
    }

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    /**
     * @return relation
     */
    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getCreatedAt(){
        return $this->createdAt;
    }

    /**
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return datetime
     */
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    /**
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt){
        $this->updatedAt = $updatedAt;
        return $this;
    }
}