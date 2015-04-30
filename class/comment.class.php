<?php
require_once "DB.class.php";
require_once "User.class.php";

class comment{

    public $postid;
    public $userID;
    public $commentDate;
    public $commentID;
    public $commentTable;

    function __construct($data) {
        $this->userID = isset($data['userID']) ? $data['userID'] : "";
        $this->postid = isset($data['postid']) ? $data['postid'] : "";
        $this->commentDate = isset($data['commentDate']) ? $data['commentDate'] : "";
        $this->commentTable = isset($data['commentTable']) ? $data['commentTable'] : "";
        
    }

    /* @param array
     * Takes an array of info,
     * fills the comment with the info
     * inserts the comment into the comments table.
     */
    public function create($newComment = false) {
        $db = new DB();
        $db->connect();
        $data = array();
        $data['userID'] = "'$this->userID'";
        $data['postid'] = "'$this->postid'";
        $data['commentDate'] = "'$this->commentDate'";
        $data['commentTable'] = "'$this->commentTable'";
    
        $data['commentDate'] = "'".date("Y-m-d:h:i:s", time()). "'";
        $this->commentID = $db->insert($data, "commentID");
        
        $db->closeCon();
        return $this->commentID;
    }

}
?>