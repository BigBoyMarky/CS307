<?php
/**
 * Created by PhpStorm.
 * User: jay
 * Date: 2/26/15
 * Time: 9:26 PM
 */
    require_once "inc/global.inc.php";

    $uh = new UserHandler();
    $uh->logout();
    header("Location: index.php");

?>