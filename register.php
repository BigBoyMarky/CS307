<?php
/**
 * User: <?php
/**
 * User: jay
 * Date: 2/26/15
 * Time: 8:15 PM
 */
require_once "inc/global.inc.php";
if (isset($_SESSION['logged_in'])) {
    header("Location: index.php");
}
  $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $success = true;
    $uh = new UserHandler();
    if ($uh->checkDuplicate($email)) {
        $success = false;
    }
    if ($password != $repeatpassword) {
        $success = false;
    }
    if ($success) {
        $data = array();
        $data['email'] = $email;
        $data['password'] = md5($password);
        $uh->signup($data);
        echo 1;
    }
?>