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

    public function __construct(){

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


}