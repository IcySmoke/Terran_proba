<?php
require APP . "core/model.php";

/**
 * Class car
 */
class CarModel extends Model
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

    public function __construct(){

    }

    public function newCar($barnd, $plate, $kilometers, $year, $status, $user){

        $this->setBrand($barnd);
        $this->setPlate($plate);
        $this->setKilometers($kilometers);
        $this->setYear($year);
        $this->setStatus($status);
        $this->setUser($user);

        return $this->save();
    }

    public function save(){
        $db = parent::connect();
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

    /**
     * find all
     * @param null $columns
     * @return array
     */
    public static function findAll($columns = null){
        $db = parent::connect();

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
        $db = parent::connect();

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
        $db = parent::connect();

        $keys = [];
        $values = [];

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