<?php

require_once "PetPost.class.php";
require_once "DB.class.php";
require_once "User.class.php";

class PetPostsHandler {

    /* @param postid @return boolean
     * Scans the table for a post matching the post id
     * Return new post if found
     */
    public function fetchPost($postid){
        $db = new DB();
        $db->connect();
        $result = $db->select("petposts", "id = '$postid'", true);
        $db->closeCon();
        if ($result) {
            return new PetPost($result);
        } else
            return false;
    }

    /* @param postid @return true
     * Scans the table for a post matching the post id
     * Return true if post is found and deleted
     */
    public function deletePost($postid){
        $db = new DB();
        $db->connect();
        $result = $db->select("petposts", "id = '$postid'", true);
        $db->closeCon();
        if ($result) {
            $db->delete("petposts", $postid);
            return true;
        } else
            return false;
    }

    /*
     *  @param data array   @return post id or false if failed.
     *  Create the post and stores it in the database.
     */
    public function createPost($data) {
        $petpost = new PetPost($data);
        return $petpost->create(true);
    }
     /*
     *  @param data array   @return post id or false if failed.
     *  Edit the post stored in the database.
     */
    public function editPost($data) {
        $petpost = new PetPost($data);
        return $petpost->create(false);
    }

    /*
     *  @param user ID      @return all posts created by the user in an array
     *  Find all posts created by user with uid and return them in an array.
     */
    public function fetchUserPost($uid) {
        $db = new DB();
        $db->connect();
        $result = $db->select("petposts", "userID = '$uid'");
        $db->closeCon();
        return $result;
    }

    /*
    Mark's fetch all posts method
    */
    public function fetchAllPosts() {
        $db = new DB();
        $db->connect();
        $result = $db->getpetsAll();
        return $result;
    }
    
     public function fetchlocation($location) {
        $db = new DB();
        $db->connect();
        echo $location;
        $result = $db->select("petposts", "location = '$location'", false);
        echo $result[0];
        return $result;
    }

    public function fetchSearchedPosts($data) {
        $db = new DB();
        $db->connect();
        $result = $db->getpetSearched($data);
        return $result;
    }

}