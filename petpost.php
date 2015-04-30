<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 7:54 PM
 */

require_once "inc/global.inc.php";
//require_once "class/PetPostHandler.class.php";
$ph = new PetPostsHandler();
$post = $ph->fetchPost($_GET['id']);
if (isset($_POST['sendmessage'])) {
    header("Location: sendmessage.php?id=".$post->userID);
}
function is_dir_empty($dir) {

$files_in_directory = scandir($dir);
$items_count = count($files_in_directory);
if ($items_count <= 2)
{
    return true;
}
else {
    return false;
}
}
?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        <?php if ($post) echo $post->petName; else echo "Does Not Exist!"; ?> ~ Missing Dog
    </title>
     <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <link href="css/lightbox.css" rel="stylesheet" />
    <script>jQuery(document).ready(function() {
            jQuery('.tabs .tab-links a').on('click', function(e)  {
                var currentAttrValue = jQuery(this).attr('href');

                // Show/Hide Tabs
                jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

                // Change/remove current tab to active
                jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

                e.preventDefault();
            });
        });</script>
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
                    </center>
                   <?php 

?><center>
                 <?php
                $id = $_GET['id'];


                   
                $target_path = "uploads/petposts/".$id."/";
           
                
                if(is_dir_empty( $target_path)){
                     echo "<tr>";
                     echo "<td>";
                     echo "not picture uploaded";
                     echo "</td>";
                      echo "</tr>";
                }else{

                    $files1 = scandir($target_path);
                    $size= count($files1);
                   $group="group_pics";
                   for ($i=0; $i < $size ; $i++) { 
                      $target_path = "uploads/petposts/".$id."/";
                      if (!strcmp($files1[$i],".")||!strcmp($files1[$i],"..") ) {
                        continue;
                      }
                          echo "<tr>";
                        echo "<td>";
                       $target_path = "uploads/petposts/".$id."/".$files1[$i];
                    $file_name=$files1[$i];
                 echo "  <a  href=\"".$target_path."\"";
                 echo "data-lightbox=\"";
                 echo   $group;
                 echo "\">    ";


                    echo '<img  src ="'.  $target_path.'"   width="300" />   ';
                    echo "</a>";
                    echo "</td>";
                    echo "</tr>";
                    }
            }
            ?>
            </center>


<br />
<br />
<br />
<br />
<br />
<center>
    <div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">Report Details</a></li>
        <li><a href="#tab2">Comments</a></li>
    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
                                <table>
                        <tr>
                            <td>Pet Name:</td>
                            <td><?php echo $post->petName; ?></td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td><?php echo $post->location; ?></td>
                        </tr>
                        <tr>
                            <td>Age:</td>
                            <td><?php echo $post->age; ?></td>
                        </tr>
                        <tr>
                            <td>Species:</td>
                            <td><?php echo $post->species; ?></td></tr>
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
                <br>
                <form action="<?php echo $PHP_SELF;?>" method="POST">
                <input type = "hidden" name = "sendmessageID" value = <?php echo $post->userID;?>>
                <input type = "submit" name = "sendmessage" value = "Send a message"/ >
            </form>

        </div>
 
        <div id="tab2" class="tab">
                            <?php 
                        if (isset($_SESSION['user'])) { ?>
                        <table>
                   
                    <form action=<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id'];?> method="post"> 

                     
                        <td><textarea name="comment" rows="8" cols="50"></textarea></td>
                
                        <td><input type="submit" value="Submit" name="submit"></td>
                    
                    </form>
                    </table>
            <?php } ?>
            <table>
                         <?php
                         if (isset($_POST['submit']) && isset($_SESSION['user'])) {
                                $user = unserialize($_SESSION['user']);
                            $userID = $user->id;
                            $comments = $_POST['comment'];
                            $postid = $_GET['id'];
                   
                            $data = array();
                            $data['userID'] = $userID;
                            $data['commentTable'] = $comments;  
                     
                            $data['postid'] = $postid;
                            $ch = new comment($data);
                            $id = $ch->create(true);
                            unset($_POST['submit']);
                            header("Location: post22.php?id = $postid");
                            
                         }
                         $ch = new CommentHandler();
                         $comment = $ch -> fetchPostComment($_GET['id']);
                         $uh = new UserHandler();
                            $len = count($comment);

                            for ($j = 0; $j < $len; $j++) {
                                echo "<tr>";
                                echo "<td>".$uh->getUser($comment[$j]['userID'])->fname."</td>";
                                echo "<td width = '300'></td>";
                                echo "<td>".$comment[$j]['commentTable']."</td>";
                                echo "</tr>";
                            }
                            
                        ?>
                       
                


                    </table>
        </div>
    </div>
</div>


            <br><br><br>
        </div>
    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</body>

</html>