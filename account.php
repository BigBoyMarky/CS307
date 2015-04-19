<?php
/**
 * Author: aaron and kaijun
 * Date: 3/3/15
 * Time: 4:51 PM
 */

require_once "inc/global.inc.php";

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
}

$user = unserialize($_SESSION['user']);
$usrcls = new User();

//$usrcls->update(false);


?>

<!doctype html>

<html>
<head>

    <meta charset="utf-8">
    <title>
        Account | Mippsy
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="pp.js"></script>
</head>

<body>
<div id ="content">
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
            <h1>My Account</h1></center>
              
<hr width="30%">
<br>





<div id = "account_top">

<div id = "account_top_left">

                         <?php
                  $user = unserialize($_SESSION['user']);
                  $data = $user->get_all();
	          $target_dir = "uploads/usr/";

   $uEmail = $user->email; //ex: "ho52"@purdue.edu
    $pathName = strstr($uEmail, '@', true); 
    $target_dir=$target_dir.$pathName; // target_dir is now uploads/usr/ho52
     $target_dir=$target_dir."/";
      if (file_exists($target_dir."profile.png")){
      
    $target_dir .= "profile.png";
      echo "<tr> <td>" ;
       echo '<img id="myImg" src ='. $target_dir.'> ';
      echo "</tr>  </td>";
              } 
          else if (file_exists($target_dir."profile.jpg")){
           $target_dir .= "profile.jpg";
      echo "<tr> <td>" ;
       echo '<img id="myImg" src ='. $target_dir.'> ';
      echo "</tr>  </td>";
          } 
          else if (file_exists($target_dir."profile.jpeg")){
       $target_dir .= "profile.jpeg";
   echo "<tr> <td>" ;
       echo '<img id="myImg" src ='. $target_dir.'> ';
      echo "</tr>  </td>";
          } else{
            echo '<tr> <td><img id="myImg" src = "images/dpp.png">  </td> </tr>';
          }
    
                ?>

<br />
<br />
</div>
                <div id = "account_top_right">

                            <?php echo "<h1>". $user->fname ." ". $user->lname ."</h1>";?>
              <a href='edit_profile.php?id='>Edit User Proile</a>
                        
        
                        </div>


</div>



<hr width="100%">




  <h2>Personal Information</h2>
<h3>Age:</h3><?php echo $user->age; ?>
<h3>Gender:</h3><?php echo $user->gender; ?>
<h3>Email Address:</h3><?php echo $user->email; ?>
<h3>Phone Number:</h3><?php echo $user->contactNumber; ?>

<!--
                         <table>                
                        <tr>
                            <td>Age:</td>
                            <td><?php echo $user->age; ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $user->gender; ?></td></tr>
                        <tr>
                            <td>Email Address:</td>
                            <td><?php echo $user->email; ?></td></tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td><?php echo $user->contactNumber; ?></td></tr>
                    </table>-->


            <br>
            <br>


    </div>
    <div id="footer">
        <?php include "inc/footer.php"; ?>
    </div>
</div>
</div>
</body>

</html>