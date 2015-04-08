<?php
require_once "inc/global.inc.php";
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$mh = new MessageHandler();
$user = unserialize($_SESSION['user']);
$uid = $user->id;
$messages = $mh->fetchUserReceivedMessages($uid);

$uh = new UserHandler();
$receiverName = unserialize($_SESSION['user'])->fname;
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        My Messages | Mippsy
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
            <h1>My Messages</h1>
            <table id="Messages">
                <?php
                    $len = sizeof($messages);
                    for ($i = 0; $i < $len; $i++) {
                        echo "<tr>";
                        //echo "<td>".$i."</td>";
                        //echo "<td>".$messages[$i]['senderID']."<td>";
                        //echo "<td>From: ".$senderName."</td>";
                        echo "<td>From: ".$uh->getUser($messages[$i]['senderID'])->fname."<td>";
                        echo "<td>To: ".$receiverName."</td>";
                        //echo "<td>".$messages[$i]['receiverID']."<td>";
                        echo "<td>Subject: ".$messages[$i]['messageSubject']."<td>";
                        echo "<td>".$messages[$i]['messageText']."<td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </center>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>