<?php
/*
* Author: Aaron & Kai Jun
* Date: 2/28/2015
* Time: 5:30 pm
*/

/*
 *  Last modified : 3/3/2015
 *  1) Removed all utility function to the PostsHandler class
 *  2) Modified variables name to match database columns.
 *  3) Modified create function so it will support updating depending on parameter
 *  4) Temporarily removed location entry. Will be added in the future as a feature.
 *
 *  -- jay
 */

require_once "DB.class.php";
require_once "User.class.php";

class Post{

    public $postid;
    public $userID;
    public $fname;
    public $lname;
    public $age;
    public $gender;
    public $contactNumber;
    public $emailAddress;
    public $additionalInfo;

    function __construct($data) {
        $this->userID = isset($data['userID']) ? $data['userID'] : "";
        $this->fname = isset($data['fname']) ? $data['fname'] : "";
        $this->lname = isset($data['lname']) ? $data['lname'] : "";
        $this->age = isset($data['age']) ? $data['age'] : "";
        $this->gender = isset($data['gender']) ? $data['gender'] : "";
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
        $data['fname'] = "'$this->fname'";
        $data['lname'] = "'$this->lname'";
        $data['age'] = "'$this->age'";
        $data['gender'] = "'$this->gender'";
        $data['contactNumber'] = "'$this->contactNumber'";
        $data['emailAddress'] = "'$this->emailAddress'";
        $data['additionalinfo'] = "'$this->additionalInfo'";
        if ($newPost) {
            $data['date'] = "'".date("Y-m-d:h:i:s", time()). "'";
            $this->postid = $db->insert($data, "posts");
        } else {
            $db->update($data, "posts", ' id = '.$this->postid);
        }
        $db->closeCon();
        return $this->postid;
    }

}
?>