<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 4:51 PM
 */
require_once "inc/global.inc.php";
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$ph = new PetPostsHandler();
$user = unserialize($_SESSION['user']);
$uid = $user->id;
$posts = $ph->fetchUserPost($uid);
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        My Pet Posts | Mippsy
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
            <h1>My Pet Posts</h1>
            <table id="petPosts">
                <?php
                    $len = sizeof($posts);
                    for ($i = $len - 1; $i >= 0; $i--) {
                        echo "<tr>";
                        //echo "<td>".$i."</td>";
                        echo "<td>"."<a href='petpost.php?id=".$posts[$i]['id']."'>".$posts[$i]['petName']." </a>" ."</td>";
                        echo "<td>".$posts[$i]['age']."<td>";
                        echo "<td>".$posts[$i]['species']."<td>";
                        echo "<td>".$posts[$i]['date']."<td>";
                        echo "<td>"."<a href='editpetpost.php?id=".$posts[$i]['id']."'>"."Edit Post"."</td>";
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