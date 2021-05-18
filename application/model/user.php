<?php
//require APP . "core/model.php";

/**
 * Class UserModel
 */
class UserModel extends Model
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var bool
     */
    private $admin;

    public function __construct(){

    }

    public function newUser($firstName, $lastName, $email, $phone, $pass){

        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPhone($phone);
        $this->setPass(password_hash($pass, PASSWORD_DEFAULT));

        return $this->save();
    }

    public function save(){
        $db = parent::connect();
        $sql = "INSERT INTO user (first_name, last_name, email, phone, pass, admin, status, created_at)
                VALUES (:first_name, :last_name, :email, :phone, :pass, :admin, :status, :created_at)";

        $query = $db->prepare($sql);

        $parameters = [
            ':first_name' => $this->firstName,
            ':last_name' => $this->lastName,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':pass' => $this->pass,
            ':admin' => 0,
            ':status' => 1,
            ':created_at' => date("Y-m-d h:i:s"),
        ];

        return $query->execute($parameters);

    }

    /**
     * Get id
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Get firstName
     * @return string
     */
    public function getFirstName(){
        return $this->firstName;
    }

    /**
     * Set firstName
     */
    public function setFirstName($firstName){
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get lastName
     * @return string
     */
    public function getLastName(){
        return $this->lastName;
    }

    /**
     * Set lastName
     */
    public function setLastName($lastName){
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get email
     * @return string
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * Set email
     */
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    /**
     * find all
     * @param null $columns
     * @return array
     */
    public static function findAll($columns = null){
        $db = parent::connect();

        if($columns){
            $sql = "SELECT " . implode(', ', $columns) . " FROM user";
        }else{
            $sql = "SELECT * FROM user";
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

        $sql = "SELECT * FROM user WHERE $column = '$value'";

        $query = $db->prepare($sql);
        $query->execute();

        $res = $query->fetchAll();

        if($res){
            return $res[0];
        }

        return false;
    }

    /**
     * Get phone
     * @return string
     */
    public function getPhone(){
        return $this->phone;
    }

    /**
     * Set phone
     */
    public function setPhone($phone){
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get pass
     * @return string
     */
    public function getPass(){
        return $this->pass;
    }

    /**
     * Set pass
     */
    public function setPass($pass){
        $this->pass = $pass;
        return $this;
    }

    /**
     * Is admin
     * @return bool
     */
    public function isAdmin(){
        return $this->admin;
    }

    /**
     * Set admin
     */
    public function setAdmin(){
        $this->admin = true;
        return $this;
    }


}