<?php
/**
 * Author: jay
 * Date: 2/26/15
 * Time: 7:27 PM
 */

require_once "class/DB.class.php";
require_once "class/User.class.php";

class UserHandler {

    /*
     *  @param email, password.     @return boolean
     *  Find a match in the database with the provided credentials
     *  If found, set session to with user's information
     *  Return true if valid, false if invalid
     */
    public function login($email, $password)
    {
        $db = new DB();
        $db->connect();
        $result = $db->select("user", "email = '$email' AND password = '$password'", true);
        $db->closeCon();
        if ($result) {
            $newUser = new User($result);
            $_SESSION['user'] = serialize($newUser);
            $_SESSION['login_time'] = time();
            $_SESSION['logged_in'] = 1;
            return true;
        } else {
            return false;
        }
    }

    /*
     *  @param none     @return none
     *  Log user off, unset user information from the session variable.
     */
    public function logout() {
        if (!isset($_SESSION['logged_in']))
            return true;
        unset($_SESSION['user']);
        unset($_SESSION['login_time']);
        unset($_SESSION['logged_in']);
    }

    /*
     *  @param email    @return boolean
     *  Check if user email is already taken.
     *  Return true if taken, false if not.
     */
    public function checkDuplicate($email) {
        $db = new DB();
        $db->connect();
        $result = $db->select("user", "email = '$email'", true);
        $db->closeCon();
        return $result ? true : false;
    }

    /*
     *  @param id       @return new user object / false
     *  Using an id value, obtain user information from database and store in new User object
     *  return new User object if found, false if not found.
     */
    public function getUser($id) {
        $db = new DB();
        $db->connect();
        $result = $db->select("user", "id = '$id'", true);
        $db->closeCon();
        if ($result) {
            return new User($result);
        }
        else
            return false;
    }

    /*
     *  @param data     @return boolean
     *  Create new user object using the data array containing user information
     *  Save user credential in database and log the user in.
     *  If successful, return true.
     *  else return false.
     */
    public function signup($data) {
        $db = new DB();
        $db->connect();
        $user = new User($data);
        $user->save(true);
        $this->login($user->email, $user->hashedpw);
        
        $userlogin = $user->email;
        $userid = $user->id;
        $subject = "[Mippsy] Welcome :^)";
        $headers = <<<MESSAGE
From: Mippsy
Content-Type: text/plain;
MESSAGE;

        $msg = <<<EMAIL
You have a new account ready at Mippsy!
On behalf of the team, we welcome you on board.

To get started, please activate your account usin the following link:

Your login: $userlogin

Activate your account: http://mippsy.com/verifyuser.php?id=$userid

If you have any questions, please contact chen1114@purdue.edu

--
Thanks!

Team 10
www.mippsy.com
EMAIL;

        mail($user->email,$subject,$msg,$headers);

        $db->closeCon();
        if (isset($_SESSION['logged_in']))
            return true;
        else
            return false;
    }


}