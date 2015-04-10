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
//if (isset($_POST['sendmessage'])) {
$receiverID = $_GET['id'];

    //unset($_POST['sendmessage']);
    // do the stuff to send the message
//}
if (isset($_POST['submit'])) {
    $senderID = $_POST['senderID'];
    //$receiverID = $_POST['receiverID'];
    $messageText = $_POST['messageText'];
    $messageSubject = $_POST['messageSubject'];
    $messageID = $_POST['messageID'];
    $user = unserialize($_SESSION['user']);
    // error checking to be added!
    $data = array();
    $senderID = unserialize($_SESSION['user'])->id;
    $data['senderID'] = $senderID;
    $data['receiverID'] = $receiverID;
    $data['messageText'] = $messageText;
    $data['messageSubject'] = $messageSubject;
    $data['messageID'] = $messageID;
    $mh = new MessageHandler();
    $id = $mh->createMessage($data);
}
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Send Message | Mippsy
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
            <h1>Send Message</h1>
            <table id="messages">
                <form action="<?php echo $PHP_SELF;?>" method="POST">
                    <td>Message Subject: <input type = "text" name = "messageSubject"></td>
                    <td><textarea name="messageText" rows="8" cols="50"></textarea></td>
                    <input type = "submit" name = "submit"/>
                </form>
                <?php
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