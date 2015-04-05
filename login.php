<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 2/26/15
 * Time: 9:30 PM
 */
    require_once "inc/global.inc.php";

    if (isset($_SESSION['logged_in'])) {
        header("Location: index.php");
    }

    $email = "";
    $password = "";
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $uh = new UserHandler();
        if($uh->login($email, md5($password))) {
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
    }

?>
