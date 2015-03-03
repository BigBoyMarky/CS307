<?php

/*
*	Author: Aaron & Kai Jun
*	Date: 2/28/2015
*	Time: 5:30 pm
*/


require_once "DB.class.php";
require_once "User.class.php";

class Post{

	public $postid;
	public $user;

	public $firstName;
	public $lastName;
	public $age;
	public $gender;
	public $location;
	public $contactNumber;
	public $emailAddress;
	public $additionalInfo;

	 function __construct($data) {
        $this->user = isset($data['user']) ? $data['user'] : "";
        $this->firstName = isset($data['firstName']) ? $data['firstName'] : "";
        $this->lastName = isset($data['lastName']) ? $data['lastName'] : "";
        $this->age = isset($data['age']) ? $data['age'] : "";
        $this->gender = isset($data['gender']) ? $data['gender'] : "";
        $this->location = isset($data['location']) ? $data['location'] : "";
        $this->contactNumber = isset($data['contactNumber']) ? $data['contactNumber'] : "";
        $this->emailAddress = isset($data['emailAddress']) ? $data['emailAddress'] : "";
        $this->additionalInfo = isset($data['additionalInfo']) ? $data['additionalInfo'] : "";
    }

    /*	@param array
    *	Takes an array of info,
    *	fills the post with the info
    *	inserts the post into the post table.
    */	
	public function create(){
		$db = new DB();
		$db->connect();
        $data = array();
        $data['user'] = "'$this->user'";
        $data['firstName'] = "'$this->firstName'";
        $data['lastName'] = "'$this->lastName'";
        $data['age'] = "'$this->age'";
        $data['gender'] = "'$this->gender'";
        $data['location'] = "'$this->location'";
        $data['contactNumber'] = "'$this->contactNumber'";
        $data['emailAddress'] = "'$this->emailAddress'";
        $data['additionalinformation'] = "'$this->additionalInfo'";
		$this->postid = $db->insert($data, "posts6");    

		$db->closeCon();
	}


    /*	@param postid 		@return true
    *	Scans the table for a post matching the post id
    *	Return true if post is found
    */	
	public function fetchPost($postid){
        $db = new DB();
        $db->connect();
        $result = $db->select("posts6", "postid = '$postid'", true);
        $db->closeCon();
        if ($result) {
            return new Post($result);
        }
        else
            return false;
    }

    /*	@param postid 		@return true
    *	Scans the table for a post matching the post id
    *	Return true if post is found and deleted
    */	
    public function deletePost($postid){
        $db = new DB();
        $db->connect();
        $result = $db->select("post", "postid = '$postid'", true);
        $db->closeCon();
        if ($result) {
        	delete("post", $postid);
            return true;
        }
        else
			return false;
    }


}

?>