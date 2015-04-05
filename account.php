<?php
/**
 * Author: aaron and kaijun
 * Date: 3/3/15
 * Time: 4:51 PM
 */

require_once "inc/global.inc.php";

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}

$user = unserialize($_SESSION['user']);
$usrcls = new User();

//$usrcls->update(false);


?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Account | Mippsy
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
</head>

<body>
<div id="wrapper">
    <div id="header">
        <?php
        $page = $_SERVER['PHP_SELF'];
        include "inc/menu.php";
        ?>
    </div>
    <div id="content">
        <br>
        <center>
            <h1>My Account</h1>
            <table id="account">
                <?php?>
                         <table>
                        <tr>
                            <td>First Name:</td>
                            <td><?php echo $user->fname; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td><?php echo $user->lname; ?></td>
                        </tr>
                        <tr>
                            <td>Age:</td>
                            <td><?php echo $user->age; ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $user->gender; ?></td></tr>
                        <tr>
                            <td>Email Address:</td>
                            <td><?php echo $user->email; ?></td></tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td><?php echo $user->contactNumber; ?></td></tr>
                    </table>


            </table>
            <br>
            <br>
            <a href='edit_profile.php?id='>Edit User Proile</a>

        </center>

    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>
