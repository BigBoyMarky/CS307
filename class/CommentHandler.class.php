<?php

require_once "Post.class.php";
require_once "DB.class.php";
require_once "comment.class.php";
require_once "User.class.php";

class CommentHandler {

    /* @param postid @return boolean
     * Scans the table for a post matching the post id
     * Return new post if found
     */
    public function fetchComment($commentID){
        $db = new DB();
        $db->connect();
        $result = $db->select("commentID", "id = '$commentID'", true);
        $db->closeCon();
        if ($result) {
            return new comment($result);
        } else
            return false;
    }

    /*
     *  @param data array   @return post id or false if failed.
     *  Create the post and stores it in the database.
     */
    public function createComment($data) {
        $comment = new comment($data);
        return $comment->create(true);
    }

    /*
     *  @param user ID      @return all comments created by the user in an array
     *  Find all posts created by user with uid and return them in an array.
     */
    public function fetchPostComment($postid) {
        $db = new DB();
        $db->connect();
        $result = $db->select("commentID", "postid = '$postid'");
        $db->closeCon();
        return $result;
    }

   /* public function SortByDate($postid){
            $comment = new commment();
            $array = $comment ->fetchPostComment($postid);
            if($array == fasle){
                return false;
            }
            $size = sizeof($array);
            $temp = 0;
            $result = array();
            for($i = 0; $i < $size; $i++){
                $temp = $array[$i];
                $array[$i] = $result[$size - $i];
                $result[$size - $i] = $temp;
            }   
            return $result;
            */
       
}

