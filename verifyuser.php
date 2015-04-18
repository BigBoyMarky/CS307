<?php

require_once "inc/global.inc.php";
if (!isset($_SESSION['logged_in']))  {
    header("Location: index.php");
}

?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Verify User | Mippsy
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
        <div id="verifyuser">
        <br><br>
        <center>
            <h2>Account verification</h2>
<?php 
$user = unserialize($_SESSION['user']);

$id1 = $user->id;
$id2 = $_GET['id'];
 
if ($id1 == $id2) {

    $data = $user->get_all();

    // error checking to be added!
    $data['verified'] = 1;
    $usrclass = new User($data);
    $usrclass->save();

    $msg = "Account successfully validated. You can now enjoy the full experience of Mippsy.";
   
echo $msg;
    header("Location: index.php");
}
else{
    $msg = "Invalid user.";
    echo $msg;
}

?>

        </center>
        <br><br><br>
        </div>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>