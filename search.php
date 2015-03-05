<?php
require_once "inc/global.inc.php";
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Search Posts | Mippsy
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
        <br><br>
        <center>
            <h3>This site is currently under construction!</h3>
            <br>
            <img src="images/underconstruction.jpg">
        </center>
        <br><br><br>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>
