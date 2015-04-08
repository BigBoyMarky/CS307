<?php
require_once "inc/global.inc.php";
$ph = new PostsHandler();
/*if(isset($_POST['submit'])) {
    $data = 
}*/
$user = unserialize($_SESSION['user']);
//$posts = $ph->fetchSearchedPosts($data);
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Searched Posts | Mippsy
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
            <h1>Search Posts</h1>
            <table id="Posts">
            <form action="<?php echo $PHP_SELF;?>" method="POST">
                Search: <input type="text" name="data"/>
                <input type = "submit" name = "submit"/>
            </form>
                <?php // printing out the search results
                    if (isset($_POST['submit'])) {
                        $posts = $ph->fetchSearchedPosts($_POST['data']);
                        $len = sizeof($posts);
                        for ($i = 0; $i < $len; $i++) {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>"."<a href='post.php?id=".$posts[$i]['id']."'>".$posts[$i]['fname']." ".$posts[$i]['lname']."</a>" ."</td>";
                            echo "<td>".$posts[$i]['age']."<td>";
                            echo "<td>".$posts[$i]['gender']."<td>";
                            echo "<td>".$posts[$i]['date']."<td>";
                            echo "</tr>";
                        }
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