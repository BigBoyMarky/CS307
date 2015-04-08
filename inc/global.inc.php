<?php
/**
 * Author: jay
 * Date: 2/26/15
 * Time: 8:10 PM
 */

    // Should be included in every file!!!
    require_once "class/DB.class.php";
    require_once "class/User.class.php";
    require_once "class/UserHandler.class.php";
    require_once "class/Post.class.php";
    require_once "class/PostsHandler.class.php";
    require_once "class/CommentHandler.class.php";
    require_once "class/comment.class.php";
    require_once "class/MessageHandler.class.php";
    require_once "class/Message.class.php";
    // initialize Userhandler object
    $uh = new UserHandler();
    session_start();

    // refresh user credentials if they are logged in
    if (isset($_SESSION['logged_in'])) {
        $user = unserialize($_SESSION['user']);
        $_SESSION['user'] = serialize($uh->getUser($user->id));
    }


?>