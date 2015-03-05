<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 4:50 PM
 */

require_once "inc/global.inc.php";

if (!isset($_SESSION['logged_in']))  {
    header("Location: index.php");
}
$fname = "";
$lname = "";
$age = "";
$gender= "";
$contactNumber = "";
$emailAddress = "";
$additionalInfo = "";

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $emailAddress = $_POST['emailAddress'];
    $additionalInfo = $_POST['additionalInfo'];

    $user = unserialize($_SESSION['user']);
    // error checking to be added!

    $data = array();
    $data['fname'] = $fname;
    $data['lname'] = $lname;
    $data['age'] = $age;
    $data['gender'] = $gender;
    $data['contactNumber'] = $contactNumber;
    $data['emailAddress'] = $emailAddress;
    $data['additionalInfo'] = $additionalInfo;
    $data['userID'] = $user->id;

    $ph = new PostsHandler();
    $id = $ph->createPost($data);
    echo $id;
    if ($id) {
        header("Location: post.php?id=$id");
    }

}

?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        New Post | Mippsy
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
        <div id="newpost">
        <br><br>
        <center>
            <h2>Create New Post</h2>
            <form action="newpost.php" method="POST">
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="fname"></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="lname"></td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>
                            <select name="age">
                                <?php
                                    for($value = 1; $value < 120; $value++) {
                                        echo '<option value = "'.$value.'">'.$value.'</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <select name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Number:</td>
                        <td><input type="text" name="contactNumber"></td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td><input type="email" name="emailAddress"></td>
                    </tr>
                    <tr>
                        <td>Additional Information:</td>
                        <td><textarea name="additionalInfo" rows="8" cols="50"></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="Submit" name="submit">
            </form>
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
