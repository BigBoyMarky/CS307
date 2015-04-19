<?php
require_once "inc/global.inc.php";
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$mh = new MessageHandler();
$user = unserialize($_SESSION['user']);
$uid = $user->id;
$messages = $mh->fetchUserReceivedMessages($uid);

$uid = $user->id;
$sentmessages = $mh->fetchUserSentMessages($uid);

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
            <br />
            <h2>Inbox</h2>
            <div id = "inbox_div">
            <!--<table id="Inbox">-->
                <table style = "width: 100%">
                <?php
                    $len = sizeof($messages);
                    for ($i = $len - 1; $i >= 0; $i--) {
                        echo "<tr>";
                        //echo "<td>".$i."</td>";
                        //echo "<td>".$messages[$i]['senderID']."<td>";
                        //echo "<td>From: ".$senderName."</td>";
                        echo "<td style =\"word-wrap: break-word\">From: <br />".$uh->getUser($messages[$i]['senderID'])->fname."<td>";
                        //echo "<td>To: ".$receiverName."</td>";
                        //echo "<td>".$messages[$i]['receiverID']."<td>";
                        echo "<td style =\"word-wrap: break-word\">Subject: <br />".$messages[$i]['messageSubject']."<td>";
                        echo "<td style =\"word-wrap: break-word\">Message: <br />".$messages[$i]['messageText']."<td>";
                        echo "<td>"."<a href='sendmessage.php?id=".$messages[$i]['senderID']."'>"."Reply"."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            </div>
            <br />
            <br />
            <h2>Outbox</h2>
            <div id = "outbox_div">
            <!--<table id = "Outbox">-->

                <table style = "width: 100%">

            <?php
                    $len = sizeof($sentmessages);
                    for ($i = $len - 1; $i >= 0; $i--) {
                        echo "<tr>";
                        //echo "<td>".$i."</td>";
                        //echo "<td>".$messages[$i]['senderID']."<td>";
                        //echo "<td>From: ".$senderName."</td>";
                        //echo "<td>From: ".$uh->getUser($sentmessages[$i]['senderID'])->fname."<td>";
                        echo "<td style =\"word-wrap: break-word\">To: <br />".$uh->getUser($sentmessages[$i]['receiverID'])->fname."</td>";
                        //echo "<td>".$messages[$i]['receiverID']."<td>";
                        echo "<td style =\"word-wrap: break-word\">Subject: <br />".$sentmessages[$i]['messageSubject']."<td>";
                        echo "<td style =\"word-wrap: break-word\">Message: <br />".$sentmessages[$i]['messageText']."</td>";
                        //echo "<td>"."<a href='sendmessage.php?id=".$sentmessages[$i]['senderID']."'>"."Reply"."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            </div>

        </center>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>