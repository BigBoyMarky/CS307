<?php
/**
 * Author: jay
 * Date: 3/3/15
 * Time: 7:54 PM
 */

require_once "inc/global.inc.php";
$ph = new PostsHandler();
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
                    
                    
                    
                    
                     <h3>pictures</h3>
                    <table>
                        <?php 
                $id = $_GET['id'];


                   
                $target_path = "uploads/posts/".$id."/";
           
                
                if(is_dir_empty( $target_path)){
                     echo "<tr>";
                     echo "<td>";
                     echo "not picture uploaded";
                     echo "</td>";
                      echo "</tr>";
                }else{

                    $files1 = scandir($target_path);
                    $size= count($files1);
                 
                   for ($i=0; $i < $size ; $i++) { 
                      $target_path = "uploads/posts/".$id."/";
                      if (!strcmp($files1[$i],".")||!strcmp($files1[$i],"..") ) {
                        continue;
                      }
                          echo "<tr>";
                        echo "<td>";
                        $target_path = "uploads/posts/".$id."/".$files1[$i];

                      
                        
                        echo '<img  src ='.  $target_path.'> ';
                      echo "</td>";
                      echo "</tr>";
                   }
                }
                        ?>
    
                    </table>
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
                <br>
                <form action="<?php echo $PHP_SELF;?>" method="POST">
                <input type = "hidden" name = "sendmessageID" value = <?php echo $post->userID;?>>
                <input type = "submit" name = "sendmessage" value = "Send a message"/ >
            </form>















             <h4>COMMENTS</h4>
                    
                    </tr>
                   
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