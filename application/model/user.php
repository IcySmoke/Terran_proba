<?php

/**
 * Class UserModel
 */
class UserModel
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

    /**
     * @var bool
     */
    private $status;

    public function __construct($user = null){
        if($user){
            $this->id = $user->id;
            $this->setFirstName($user->first_name)
                ->setLastName($user->last_name)
                ->setEmail($user->email)
                ->setPhone($user->phone)
                ->setAdmin($user->admin)
                ->setStatus($user->status)
            ;
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

    public function newUser($firstName, $lastName, $email, $phone, $pass){

        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPhone($phone);
        $this->setPass(password_hash($pass, PASSWORD_DEFAULT));

        $db = $this->connect();
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
            ':created_at' => date("Y-m-d H:i:s"),
        ];

        $res = $query->execute($parameters);
        $this->setId($db->lastInsertId());
        return $res;
    }

    public function update(){
        $db = $this->connect();
        $sql = "UPDATE user
                SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, admin = :admin, status = :status, updated_at = :updated_at
                WHERE id = :id";

        $query = $db->prepare($sql);

        $parameters = [
            ':first_name' => $this->firstName,
            ':last_name' => $this->lastName,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':admin' => $this->admin,
            ':status' => $this->status,
            ':updated_at' => date("Y-m-d H:i:s"),
            'id' => $this->id,
        ];

        return $query->execute($parameters);

    }

    public static function delete($id){
        $db = self::connect();
        $sql = "DELETE FROM user WHERE id = :id";
        $query = $db->prepare($sql);
        $parameters = array(':id' => $id);

        $query->execute($parameters);
    }

    public function updatePass($pass){
        $db = self::connect();
        $sql = "UPDATE user
                SET pass = :pass
                WHERE id = :id";

        $query = $db->prepare($sql);

        $parameters = [
            ':pass' => password_hash($pass, PASSWORD_DEFAULT),
            ':id' => $_GET['id'],
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
     * @param $id
     * @return $this
     */
    public function setId($id){
        $this->id = $id;
        return $this;
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
        $db = self::connect();

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
        $db = self::connect();

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
     * @param $admin
     * @return $this
     */
    public function setAdmin($admin){
        $this->admin = $admin;
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

}