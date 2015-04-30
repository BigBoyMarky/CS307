<?php
/*
* Author: Aaron & Kai Jun
* Date: 4/16/2015
* Time: 5:30 pm
*/


require_once "DB.class.php";
require_once "User.class.php";

class PetPost{

    public $postid;
    public $userID;
    public $petName;
    public $age;
    public $species;
    public $location;
    public $contactNumber;
    public $emailAddress;
    public $additionalInfo;

    function __construct($data) {
    	$this->postid = isset($data['id']) ? $data['id'] : "";
    	$this->userID = isset($data['userID']) ? $data['userID'] : "";
        $this->petName = isset($data['petName']) ? $data['petName'] : "";
        $this->age = isset($data['age']) ? $data['age'] : "";
        $this->species = isset($data['species']) ? $data['species'] : "";
        $this->location = isset($data['location']) ? $data['location'] : "";
        $this->contactNumber = isset($data['contactNumber']) ? $data['contactNumber'] : "";
        $this->emailAddress = isset($data['emailAddress']) ? $data['emailAddress'] : "";
        $this->additionalInfo = isset($data['additionalInfo']) ? $data['additionalInfo'] : "";
    }

    /* @param array
     * Takes an array of info,
     * fills the post with the info
     * inserts the post into the posts table.
     */
    public function create($newPost = false){
        $db = new DB();
        $db->connect();
        $data = array();
        $data['userID'] = "'$this->userID'";
        $data['petName'] = "'$this->petName'";
        $data['age'] = "'$this->age'";
        $data['species'] = "'$this->species'";
        $data['location'] = "'$this->location'";
        $data['contactNumber'] = "'$this->contactNumber'";
        $data['emailAddress'] = "'$this->emailAddress'";
        $data['additionalinfo'] = "'$this->additionalInfo'";
        if ($newPost) {
            $data['date'] = "'".date("Y-m-d:h:i:s", time()). "'";
            $this->postid = $db->insert($data, "petposts");
        } else {
            $db->update($data, "petposts", 'id='."'".$this->postid."'");
        }
        $db->closeCon();
        return $this->postid;
    }

}
?>