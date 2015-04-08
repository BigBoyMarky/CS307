<?php
require_once "inc/global.inc.php";
if (!isset($_SESSION['logged_in']))  {
    header("Location: index.php");
}
$senderID = "";
$receiverID = "";
$messageText = "";
$messageSubject = "";
$messageID = "";
if (isset($_POST['submit'])) {
    $senderID = $_POST['senderID'];
    $receiverID = $_POST['receiverID'];
    $messageText = $_POST['messageText'];
    $messageSubject = $_POST['messageSubject'];
    $messageID = $_POST['messageID'];
    $user = unserialize($_SESSION['user']);
    // error checking to be added!
    $data = array();
    $data['senderID'] = $senderID;
    $data['receiverID'] = $receiverID;
    $data['mesasgeText'] = $mesasgeText;
    $data['messageSubject'] = $messageSubject;
    $data['messageID'] = $messageID;
    //$data['userID'] = $user->id;
    $mh = new MessageHandler();
    $id = $ph->sendMail($data);
}
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Send Mail | Mippsy
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
            <h1>Send Mail</h1>
            <table id="mail">
                <?php
                    <form action="<?php echo $PHP_SELF;?>" method="POST">
                        Receiver: <input type="text" name="receiver"/>
                        <td>Additional Information:</td>
                        <td><textarea name="additionalInfo" rows="8" cols="50"></textarea></td>
                        <input type = "submit" name = "submit"/>
                    </form>
                    /*$len = sizeof($mail);
                    for ($i = 0; $i < $len; $i++) {
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>"."<a href='mymail.php?id=".$mail[$i]['id']."'>".$mail[$i]['fname']." ".$mail[$i]['lname']."</a>" ."</td>";
                        echo "<td>".$mail[$i]['age']."<td>";
                        echo "<td>".$mail[$i]['gender']."<td>";
                        echo "<td>".$mail[$i]['date']."<td>";
                        echo "<td>"."<a href='editmymail.php?id=".$mail[$i]['id']."'>"."Edit mail"."</td>";
                        echo "</tr>";
                    }*/
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