<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 4:31 PM
 */

require_once "Post.class.php";
require_once "DB.class.php";
require_once "User.class.php";
require_once "Message.class.php";

class MessageHandler {



    public function deleteMessage($messageID){
        $db = new DB();
        $db->connect();
        $result = $db->select("Messages", "id = '$messageID'", true);
        $db->closeCon();
        if ($result) {
            $db->delete("Messages", $messageID);
            return true;
        } else
            return false;
    }


    public function createMessage($data) {
        $message = new Message($data);
        return $message->create(true);
    }
  

    public function fetchUserSentMessages($mid) {
        $db = new DB();
        $db->connect();
        $result = $db->select("Messages", "senderID = '$mid'");
        $db->closeCon();
        return $result;
    }


    public function fetchUserReceivedMessages($mid) {
        $db = new DB();
        $db->connect();
        $result = $db->select("Messages", "receiverID = '$mid'");
        $db->closeCon();
        return $result;
    }

    /*public function fetchUserSentMessages($mid) {
        $db = new DB();
        $db->connect();
        $result = $db->select("Messages", "senderID = '$mid'");
        $db->closeCon();
        return $result;
    }*/

    public function fetchMessageID($mid) {
        $db = new DB();
        $db->connect();
        $result = $db->select("Messages", "messageID = '$mid'");
        $db->closeCon();
        return $result;
    }

    public function sendMessage($mid) {
        $db = new DB();
        $db->connect();
        $result = $db->select("Messages", "");
        return $result;
    }

}