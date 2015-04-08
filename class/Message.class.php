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

class Message{

    public $messageID;
    public $senderID;
    public $receiverID;
    public $messageText;
    public $messageSubject;


    function __construct($data) {
        $this->senderID = isset($data['senderID']) ? $data['senderID'] : "";
        $this->receiverID = isset($data['receiverID']) ? $data['receiverID'] : "";
        $this->messageText = isset($data['messageText']) ? $data['messageText'] : "";
        $this->messageSubject = isset($data['messageSubject']) ? $data['messageSubject'] : "";
        $this->messageID = isset($data['messageID']) ? $data['messageID'] : "";

    }

    /* @param array
     * Takes an array of info,
     * fills the post with the info
     * inserts the post into the posts table.
     */
    public function create(){
        $db = new DB();
        $db->connect();
        $data = array();
        $data['senderID'] = "'$this->senderID'";
        $data['receiverID'] = "'$this->receiverID'";
        $data['messageText'] = "'$this->messageText'";
        $data['messageSubject'] = "'$this->messageSubject'";
        $data['messageID'] = "'$this->messageID'";

        $data['date'] = "'".date("Y-m-d:h:i:s", time()). "'";
         $this->messageID = $db->insert($data, "Messages");

        $db->closeCon();
    }

}
?>