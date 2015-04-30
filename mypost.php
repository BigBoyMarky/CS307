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
$ph = new PostsHandler();
$ps = new PetPostsHandler();
$user = unserialize($_SESSION['user']);
$uid = $user->id;
$posts = $ph->fetchUserPost($uid);
$posts2 = $ps->fetchUserPost($uid);
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        My Posts | Mippsy
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
            <h1>My Posts</h1>
            <table id="Posts">
                <?php
                    $len = sizeof($posts);
                    for ($i = $len - 1; $i >= 0; $i--) {
                        echo "<tr>";
                        //echo "<td>".$i."</td>";
                        echo "<td>"."<a href='post.php?id=".$posts[$i]['id']."'>".$posts[$i]['fname']." ".$posts[$i]['lname']."</a>" ."</td>";
                        echo "<td>".$posts[$i]['age']."<td>";
                        echo "<td>".$posts[$i]['gender']."<td>";
                        echo "<td>".$posts[$i]['date']."<td>";
                        echo "<td>"."<a href='editpost.php?id=".$posts[$i]['id']."'>"."Edit Post"."</td>";
                        echo "</tr>";
                    }
                ?>
                <?php
                    $len = sizeof($posts2);
                    for ($i = $len - 1; $i >= 0; $i--) {
                         echo "<tr>";
                        //echo "<td>".$i."</td>";
                        echo "<td>"."<a href='petpost.php?id=".$posts2[$i]['id']."'>".$posts2[$i]['petName']." </a>" ."</td>";
                        echo "<td>".$posts2[$i]['age']."<td>";
                        echo "<td>".$posts2[$i]['species']."<td>";
                        echo "<td>".$posts2[$i]['date']."<td>";
                        echo "<td>"."<a href='editpetpost.php?id=".$posts2[$i]['id']."'>"."Edit Post"."</td>";
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