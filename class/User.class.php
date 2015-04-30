<?php
/**
 * Author: jay
 * Date: 2/25/15
 * Time: 8:25 PM
 */
require_once "class/DB.class.php";
class User {
    public $id;
    public $email;
    public $hashedpw;
    public $fname;
    public $lname;
    public $age;
    public $gender;
    public $contactNumber;
    public $city;
    public $state;
    public $country;

    public $verified;

    // constructor for the User class. Takes in an array. More variables to be added.
    function __construct($data) {
        $this->id = isset($data['id']) ? $data['id'] : "";
        $this->email = isset($data['email']) ? $data['email'] : "";
        $this->hashedpw = isset($data['password']) ? $data['password'] : "";
        $this->fname = isset($data['fname']) ? $data['fname'] : "";
        $this->lname = isset($data['lname']) ? $data['lname'] : "";
        $this->age = isset($data['age']) ? $data['age'] : "";
        $this->gender = isset($data['gender']) ? $data['gender'] : "";
        $this->contactNumber = isset($data['contactNumber']) ? $data['contactNumber'] : "";
        $this->city = isset($data['city']) ? $data['city'] : "";
        $this->state = isset($data['state']) ? $data['state'] : "";
        $this->country = isset($data['country']) ? $data['country'] : "";
        $this->verified = isset($data['verified']) ? $data['verified'] : "";
    }
    /*
     *  @param boolean @return true if success.
     *  Save or update user information to database.
     */
    public function save($newUser = false) {
        $db = new DB();
        $db->connect();
        if ($newUser) {
            $data = array("email" => "'$this->email'", "password" => "'$this->hashedpw'",
                "join_date" => "'".date("Y-m-d:h:i:s", time())."'");
            $this->id = $db->insert($data, "user");
        } else {
            $data = array("password" => "'$this->hashedpw'", "fname" => "'$this->fname'",
                "lname" => "'$this->lname'", "age" => "'$this->age'", "gender" => "'$this->gender'",
                "contactNumber" => "'$this->contactNumber'", "city" => "'$this->city'",
                "state" => "'$this->state'", "country" => "'$this->country'", "verified" => "'$this->verified'");
            $db->update($data, "user", ' id = '.$this->id);
        }
        $db->closeCon();
        return true;
    }
    /*
     *  @param null @return array containing all fields
     *  Return all the field variables in an array.
     */
    public function get_all() {
        $arr['id'] = $this->id;
        $arr['email'] = $this->email;
        $arr['password'] = $this->hashedpw;
        $arr['fname'] = $this->fname;
        $arr['lname'] = $this->lname;
        $arr['age'] = $this->age;
        $arr['gender'] = $this->gender;
        $arr['contactNumber'] = $this->contactNumber;
        $arr['city'] = $this->city;
        $arr['state'] = $this->state;
        $arr['country'] = $this->country;
        $arr['verified'] = $this->verified;
        return $arr;
    }
}
?>