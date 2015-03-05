<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 7:54 PM
 */

require_once "inc/global.inc.php";
$ph = new PostsHandler();
$post = $ph->fetchPost($_GET['id']);
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        <?php if ($post) echo $post->fname; else echo "Does Not Exist!"; ?> ~ Missing Person
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
                <?php if(!$post): ?>
                    This post does not exists.
                    <br>
                    &#9786;
                <?php else: ?>
                    <h2>Missing Report</h2>
                    <table>
                        <tr>
                            <td>First Name:</td>
                            <td><?php echo $post->fname; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td><?php echo $post->lname; ?></td>
                        </tr>
                        <tr>
                            <td>Age:</td>
                            <td><?php echo $post->age; ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $post->gender; ?></td></tr>
                        <tr>
                            <td>Additional Information:</td>
                            <td><?php echo $post->additionalInfo; ?></td>
                        </tr>
                    </table>
                    <h3>Contact Information</h3>
                    <table>
                        <tr>
                            <td>Contact Number:</td>
                            <td><?php echo $post->contactNumber; ?></td>
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td><?php echo $post->emailAddress; ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
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
