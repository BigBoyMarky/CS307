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

$query = "";
$method = "";


if (isset($_POST['submit'])) {
    $query = $_POST['query'];

    $method = $_POST['method'];

    //$user = unserialize($_SESSION['user']);
    // error checking to be added!
    $data = array();
    $data['query'] = $query;
    $data['method'] = $method;

    //$data['userID'] = $user->id;


    //$ph = new PostsHandler();

    //$id = $ph->editPost($data);


    //echo $id;
    //if ($id) {
    //    header("Location: post.php?id=$id");
    //}
}
?>


<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Search | Mippsy
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
        <div id="searchpost">
        <br><br>
        <center>
            <h2>Search Post</h2>
            <form action="searchpost.php" method="POST">
                <table>
                    <tr>
                        <td>Search:</td>
                        <td><input type="text" name="query"></td>
                        <td>
                            <select name="method">
                                <option value="N">Search By Name</option>
                                <option value="D">Search By Date</option>
                                <option value="L">Search By Location</option>
                            </select>
                        </td>
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